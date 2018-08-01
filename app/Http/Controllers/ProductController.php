<?php
namespace App\Http\Controllers;

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
        $notesHtml = $this->formatTextNotes($productLine, $notes);

        return view(
            'product',
            compact('productLine', 'hasFeatures', 'featuresHtml', 'notesHtml')
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
        $allProductNotes = ProductNote::with([
            'productLines'
        ])
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
            Log::info($note->body);
            $title = "";
            if (! empty($note->title)) {
                $title = "<dt>{$note->title}</dt>" . PHP_EOL;
            }
            $html .= $title;
            $html .= "<dd>{$note->body}</dd>" . PHP_EOL;
        }
        $html .= "</dl>" . PHP_EOL;

        return $html;
    }
}
