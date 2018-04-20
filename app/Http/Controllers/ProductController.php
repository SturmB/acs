<?php
namespace App\Http\Controllers;

use App\ProductFeature;
use App\ProductLine;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function Sodium\add;

class ProductController extends Controller
{
    /**
     * Show the Product view and populate it with a particular
     * Product Category and Product Subcategory combo.
     *
     * @param $category
     * @param $subcategory
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

        $allProductLines = ProductLine
            ::with(['productSubcategory', 'printMethod'])
            ->get();

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
        $this->formatTextNotes($productLine, $activeArray);

        return view(
            'product',
            compact('productLine', 'hasFeatures', 'featuresHtml')
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
        $allProductFeatures = ProductFeature
            ::with(['productFeaturesPivot', 'productLines'])
            ->orderBy('id', 'desc')
            ->get();

        // Narrow the results to only the Product Features we want for the given Product Line ID.
        $narrowedProductFeatures = $allProductFeatures
            ->reject(function ($productFeature) use ($productLineId) {
                $productLines = $productFeature->productLines->filter(
                    function ($productLine) use ($productLineId) {
                        return $productLine->id == $productLineId;
                    }
                );
                return empty(sizeof($productLines));
            })
            ->filter(function ($productFeature) use ($activeArray) {
                return in_array($productFeature->active, $activeArray);
            });

//        Log::info($narrowedProductFeatures);

        // Convert the model collection to a nested set of just the data we need,
        // before converting it to a JSON and sending it back.
        $productFeatures = Collection::make();
        $childIds = Collection::make();
        $narrowedProductFeatures->each(function ($featureItem, $key) use (
            &$narrowedProductFeatures,
            $productFeatures,
            &$childIds
        ) {
            $tempFeature = collect(
                $featureItem->only(['id', 'active', 'feature'])
            );

            if (!$childIds->contains($tempFeature['id'])) {
                // If this `$featureItem` has _not_ been used in a previous iteration as a child.
                $childFeatures = $narrowedProductFeatures->filter(
                    function ($feature) use ($tempFeature) {
                        if ($feature->productFeaturesPivot->isNotEmpty()) {
                            $match = $feature->productFeaturesPivot->firstWhere(
                                'parent_id',
                                $tempFeature['id']
                            );
//                            Log::info($match);
                            return !is_null($match);
                        }
                        return false;
                    }
                );
//                Log::info('$childFeatures:');
//                Log::info($childFeatures);
                $filteredChildren = $childFeatures->map(
                    function ($childFeature) {
//                        Log::info(
//                            collect(
//                                $childFeature->only(['id', 'active', 'feature'])
//                            )
//                        );
                        return collect(
                            $childFeature->only(['id', 'active', 'feature'])
                        );
                    }
                );

//                Log::info('$filteredChildren (outside):');
//                Log::info($filteredChildren);
                if ($filteredChildren->isNotEmpty()) {
//                    Log::info('$filteredChildren (inside):');
//                    Log::info($filteredChildren);
                    $childIds = $filteredChildren->pluck('id');
                    $tempFeature['children'] = collect($filteredChildren);
                }
//                Log::info('$tempFeature this iteration:');
//                Log::info($tempFeature);
                $productFeatures->push($tempFeature);
            }
        });

//        Log::info('FINAL $productFeatures:');
//        Log::info($productFeatures);
//        Log::info($productFeatures->toArray());
        return $productFeatures;
    }

    /**
     * Format the Features & Options into an HTML string
     * with <ul> structure.
     *
     * @param $features
     * @return string
     */
    private function formatFeatures($features)
    {
        $html = "";

//        if (gettype($features) === 'object')
//        Log::info('Feature count');
//        Log::info($features->count());
//        Log::info(gettype($features));
//        Log::info($features[0]['id']);
//        Log::info($features[0]->has('children'));
        if ($features->count() > 0) {
            $html .= "<ul>" . PHP_EOL;
            foreach ($features as $feature) {
                $html .= "<li>{$feature['feature']}</li>" . PHP_EOL;
                if ($feature->has('children')) {
//                    Log::info($feature['children']->count());
                    $html .= $this->formatFeatures($feature['children']);
                }
            }
            $html .= "</ul>" . PHP_EOL;
        }

//        Log::info('Final HTML:');
//        Log::info($html);
        return $html;
    }

    private function formatTextNotes($productLine, $activeArray)
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
        $html .= "<p>";
        $html .= "<span class='accented'>Be sure to specify:</span> ";
        if ($color_item) {
            $html .=
                ucfirst($productLine->productSubcategory->product_category_id) .
                " color, ";
        }
        if ($napkin_item && $productLine->print_method_id === "tradition") {
            $html .= "Imprint method, ";
        }
        $html .=
            "Imprint placement, Standard ink color below, or provide us with your Pantone&reg; ink number.";
        $html .= "</p>";

        // Then the list of items.
//        if ($stamping_result) {
//            $html .= "<dl>";
//            while ($stamp = mysqli_fetch_assoc($stamping_result)) {
//                $html .= "<dt>";
//                $html .= htmlentities($stamp["long_name"]) . " - ";
//                $html .= "</dt>";
//                $html .= "<dd>";
//                $html .= $stamp["pricing_text"];
//                $html .= "</dd>";
//            }
//            $html .= "</dl>";
//        }

        Log::info(
            $productLine->productSubcategory->short_name .
            ', ' .
            $productLine->productSubcategory->product_category_id
        );

        return $html;
    }
}
