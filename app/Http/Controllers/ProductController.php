<?php
namespace App\Http\Controllers;

use App\Product;
use App\ProductFeature;
use App\ProductLine;
use App\ProductNote;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Show the Product view and populate it with a particular
     * Product Category and Product Subcategory combo.
     *
     * @param $category
     * @param $subcategory
     * @param $printMethod
     * @param string $includeInactive
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(
        $category,
        $subcategory,
        $printMethod,
        $includeInactive = ''
    ) {
        // Set whether or not to include inactive items.
        $activeArray = [$includeInactive === 'include_inactive' ? 0 : 1, 1];

        $allProductLines = ProductLine::with([
            'productSubcategory',
            'printMethod'
        ])->get();

        // Filter to only the _single_ Product Line we want.
        $productLine = $allProductLines
            ->filter(function ($productLine) use (
                $category,
                $subcategory,
                $printMethod
            ) {
                return (
                    $productLine->productSubcategory->short_name ===
                        $subcategory &&
                    $productLine->productSubcategory->product_category_id ===
                        $category &&
                    $productLine->print_method_id === $printMethod
                );
            })
            ->first();

        // Get and construct the Features & Options list for this Product Line.
        $features = $this->getFeatures($productLine->id, $activeArray);
        $hasFeatures = $features->count() > 0;
        $featuresHtml = $this->formatFeatures($features);

        // Get and construct other notes for this Product Line.
        $notes = $this->getTextNotes($productLine->id, $activeArray);
        $hasNotes = $notes->count() > 0;
        $notesHtml = $this->formatTextNotes($productLine, $notes);

        // Get the splash image for this Product Line.
        $productLineText = "{$category}-{$subcategory}-{$printMethod}";

        // Get and construct the product cards for this Product Line.
        $productCards = $this->getProducts($productLine, $activeArray);

        return view(
            'product',
            compact(
                'productLine',
                'hasFeatures',
                'featuresHtml',
                'hasNotes',
                'notesHtml',
                'productLineText',
                'productCards'
            )
        );
    }

    /**
     * Get all of the Features & Options for a given Product Line.
     *
     * @param $productLineId
     * @param $activeArray
     * @return Collection
     */
    private function getFeatures($productLineId, $activeArray)
    {
        // Get the Product Features associated with the given Product Line ID.
        $allProductFeatures = ProductFeature::with([
            'productFeaturesPivot',
            'productLines'
        ])
            ->orderBy('id', 'desc')
            ->get();

        // Narrow the results to only the Product Features we want for the given Product Line ID.
        $narrowedProductFeatures = $allProductFeatures
            ->reject(function ($productFeature) use ($productLineId) {
                $productLines = $productFeature->productLines->filter(function (
                    $productLine
                ) use ($productLineId) {
                    return $productLine->id == $productLineId;
                });
                return empty(sizeof($productLines));
            })
            ->filter(function ($productFeature) use ($activeArray) {
                return in_array($productFeature->active, $activeArray);
            });

        // Convert the model collection to a nested set of just the data we need,
        // before converting it to a JSON and sending it back.
        $productFeatures = Collection::make();
        $childIds = Collection::make();
        $narrowedProductFeatures->each(function (
            ProductFeature $featureItem
        ) use (&$narrowedProductFeatures, $productFeatures, &$childIds) {
            $tempFeature = collect(
                $featureItem->only(['id', 'active', 'feature'])
            );

            if (!$childIds->contains($tempFeature['id'])) {
                // If this `$featureItem` has _not_ been used in a previous iteration as a child.
                $childFeatures = $narrowedProductFeatures->filter(function (
                    $feature
                ) use ($tempFeature) {
                    if ($feature->productFeaturesPivot->isNotEmpty()) {
                        $match = $feature->productFeaturesPivot->firstWhere(
                            'parent_id',
                            $tempFeature['id']
                        );
                        return !is_null($match);
                    }
                    return false;
                });
                $filteredChildren = $childFeatures->map(function (
                    ProductFeature $childFeature
                ) {
                    return collect(
                        $childFeature->only(['id', 'active', 'feature'])
                    );
                });

                if ($filteredChildren->isNotEmpty()) {
                    $childIds = $filteredChildren->pluck('id');
                    $tempFeature['children'] = collect($filteredChildren);
                }
                $productFeatures->push($tempFeature);
            }
        });

        return $productFeatures;
    }

    /**
     * Format the Features & Options into an HTML string
     * with <ul> structure.
     *
     * @param $features Collection
     * @return string
     */
    private function formatFeatures($features)
    {
        $html = "";

        //        if (gettype($features) === 'object')
        if ($features->count() > 0) {
            $html .= "<ul>" . PHP_EOL;
            foreach ($features as $feature) {
                $html .= "<li>{$feature['feature']}</li>" . PHP_EOL;
                if ($feature->has('children')) {
                    $html .= $this->formatFeatures($feature['children']);
                }
            }
            $html .= "</ul>" . PHP_EOL;
        }

        return $html;
    }

    /**
     * Get all of the Text Notes for a given Product Line.
     *
     * @param $productLineId
     * @param $activeArray
     * @return ProductNote[]|\Illuminate\Database\Eloquent\Builder[]|Collection
     */
    private function getTextNotes($productLineId, $activeArray)
    {
        // Get the Notes associated with the given Product Line ID.
        $allProductNotes = ProductNote::with(['productLines'])
            ->orderBy('priority', 'asc')
            ->get();

        // Narrow the results to only the Product Notes we want for the given Product Line ID.
        $narrowedProductNotes = $allProductNotes
            ->reject(function ($productNote) use ($productLineId) {
                $productLines = $productNote->productLines->filter(function (
                    $productLine
                ) use ($productLineId) {
                    return $productLine->id == $productLineId;
                });
                return empty(sizeof($productLines));
            })
            ->filter(function ($productNote) use ($activeArray) {
                return in_array($productNote->active, $activeArray);
            });

        return $narrowedProductNotes;
    }

    /**
     * Format the text notes into an HTML string
     * with a <p> at the top, then a <dl> structure below.
     *
     * @param $productLine
     * @param $notes
     * @return string
     */
    private function formatTextNotes($productLine, $notes)
    {
        $html = "";

        $color_item = preg_match(
            "/color/i",
            $productLine->productSubcategory->short_name
        );
        $napkin_item = preg_match(
            "/napkin/i",
            $productLine->productSubcategory->product_category_id
        );

        // Begin building the string that will be returned.
        // This first section is for the paragraph text.
        $productColor = "";
        $imprintMethod = "";
        if ($color_item) {
            $productColor =
                ucfirst($productLine->productSubcategory->product_category_id) .
                " color, ";
        }
        if ($napkin_item && $productLine->print_method_id === "tradition") {
            $imprintMethod = "Imprint method, ";
        }

        $html .= "<p>";
        $html .= "<span class='accented'>Be sure to specify:</span> ";
        $html .= $productColor;
        $html .= $imprintMethod;
        $html .=
            "Imprint placement, and ink color (chosen from the Standard Ink Color list below or provided as a Pantone&reg; ink number).";
        $html .= "</p>" . PHP_EOL;

        // Now add the notes we retrieved earlier.
        $html .= "<dl>" . PHP_EOL;
        foreach ($notes as $note) {
            $title = "";
            if (!empty($note->title)) {
                $title = "<dt>{$note->title}</dt>" . PHP_EOL;
            }
            $html .= $title;
            $html .= "<dd>{$note->body}</dd>" . PHP_EOL;
        }
        $html .= "</dl>" . PHP_EOL;

        return $html;
    }

    /**
     * Prepare the HTML for the thumbnail images for each Product.
     *
     * @param $productLine
     * @param $product
     * @param $decodedProductName
     * @return string
     */
    private function getThumbnails($productLine, $product, $decodedProductName)
    {
        // Preface the main thumbnail with the "Sample" ribbon.
        $result = "<div class='ribbon-wrapper'><div class='ribbon'>Sample</div></div>" . PHP_EOL;

        $folder = "images/products-assets/{$productLine->productSubcategory->productCategory->id}/{$productLine->productSubcategory->short_name}/";
//        $html_folder = substr($folder, 3);
        $productList = [$decodedProductName];

        // If this Product is one that has multiple colors, populate $productList with all of the Product Names, but have "(COLOR)" replaced with the actual Color name, formatted properly.
        if (stripos($decodedProductName, "(COLOR)") !== false) {
            // Get all the colors available for this single Product.
            $productList = [];
            $productColors = $product->colors->all();
            foreach ($productColors as $productColor) {
                // Iterate through them, format them the same as the thumbnail filenames, then put them in place of the "(COLOR)" text.
                // This is all to prepare for the thumbnail filenames.
                $condensedColorName = str_replace(['/', ' '], ['', ''], $productColor->short_name);
                $upperCaseColorName = strtoupper($condensedColorName);
                $imageName = str_replace('(COLOR)', $upperCaseColorName, $decodedProductName);
                $productList[] = $imageName;
            }
        }

        // Prepare the class and style for multi-colored Products.
        $rotatingImagesClass = "";
        $rotatingImagesStyle = "";
        if (count($productList) > 1) {
            $rotatingImagesClass = "rotating-item";
            $rotatingImagesStyle = "style='display: none;'";
        }

        // Set the correct class for Products that have a Print Method.
        $sampleExists = preg_match("/^[DTH]-/", $decodedProductName) > 0 ? true : false;
        $blankClass = '';
        if ($sampleExists) {
            $blankClass = 'thumbnail-blank';
        }


        // Build up the HTML.
        foreach ($productList as $image) {
            // Prepare the blank and sample thumbnails.
            $blankImage = asset($folder . $image . '-blank_thumb.png');
            $sampleImage = asset($folder . $image . '-sample_thumb.png');

            $result .= "<div class='{$rotatingImagesClass}' {$rotatingImagesStyle}>" . PHP_EOL;
            $result .= "<img src='{$blankImage}' class='thumbnail-image {$blankClass}' data-rjs='3' alt='{$image}'>" . PHP_EOL;
            if ($sampleExists) {
                $result .= "<img src='{$sampleImage}' class='thumbnail-image thumbnail-sample' data-rjs='3' style='display: none;' alt='{$image}'>" . PHP_EOL;
            }
            $result .= "</div>" . PHP_EOL;
        }

        return $result;
    }

    /**
     * Get all of the Products for a given Product Line.
     *
     * @param $productLine
     * @param array $activeArray
     * @return string
     */
    private function getProducts($productLine, array $activeArray)
    {
        // Get the Products associated with the given Product Line ID.
        $products = Product::where(
            'product_subcategory_id',
            $productLine->productSubcategory->id
        )->get();

        $output = "";
        foreach ($products as $product) {
            $productName = $productLine->printMethod->prefix . $product->name;
            $decodedProductName = str_replace("/", "-", $productName);
            $decodedProductName = str_replace(' ', '', $decodedProductName);
            $singletonClass = $products->count() === 1 ? 'singleton' : '';
            $rotatorClass =
                stripos($decodedProductName, "(COLOR)") !== false
                    ? 'rotating-item-wrapper'
                    : '';

            // Outer div for the entire card.
            $output .= "<div class='item-info {$singletonClass}'>" . PHP_EOL;

            // Div for the Product number (with Print Method), thumbnail, and description.
            // Usually on the left side of the card.
            $output .= "<div class='itd'>" . PHP_EOL;

            // Product number with Print Method
            $output .= "<h4 class='item-number'>{$productName}</h4>" . PHP_EOL;

            // Thumbnail
            $output .= "<div class='item-thumb'>" . PHP_EOL;
            $output .= "<div class='item-thumb-overlay overlay-rollover {$rotatorClass}'>" . PHP_EOL;
            $output .= $this->getThumbnails($productLine, $product, $decodedProductName);
            $output .= "</div>" . PHP_EOL; // div.item-thumb-overlay.overlay-rollover
            $output .= "</div>" . PHP_EOL; // div.item-thumb

            // Item Description
            $output .= "<h6 class='item-description'>{$product->description}</h6>" . PHP_EOL;

            $output .= "</div>"; // div.itd
            $output .= "</div>"; // div.item-info
        }

        return $output;
    }
}
