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
    public function index($category, $subcategory, $includeInactive = '')
    {
        // Set whether or not to include inactive items in the navbar.
        $activeArray = [$includeInactive === 'include_inactive' ? 0 : 1, 1];

        $allProductLines = ProductLine::with(['productSubcategory', 'printMethod'])
            ->get();

        $productLines = $allProductLines
            ->filter(function ($productLine) use ($category, $subcategory) {
                return $productLine->productSubcategory->short_name === $subcategory
                    && $productLine->productSubcategory->product_category_id === $category;
            })
            ->filter(function ($productLine) use ($activeArray) {
                return in_array($productLine->printMethod->active, $activeArray);
            });

        $minPriority = $productLines->min('printMethod.priority');

        return view('product', compact('productLines', 'minPriority'));
    }

    /**
     * AJAX call to get all of the Features & Options for a given Product Line.
     *
     * @param $productLineId
     * @param string $includeInactive
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFeatures($productLineId, $includeInactive = '')
    {
        // Set whether or not to include inactive items in the navbar.
        $activeArray = [$includeInactive === 'include_inactive' ? 0 : 1, 1];

        // Get the Product Features associated with the given Product Line ID.
        $allProductFeatures = ProductFeature::with(['productFeaturesPivot', 'productLines'])
            ->orderBy('id', 'desc')
            ->get();

        // Narrow the results to only the Product Features we want for the given Product Line ID.
        $narrowedProductFeatures = $allProductFeatures
            ->reject(function ($productFeature) use ($productLineId) {
                $productLines = $productFeature->productLines->filter(function ($productLine) use ($productLineId) {
                    return $productLine->id == $productLineId;
                });
                return empty(sizeof($productLines));
            })
            ->filter(function ($productFeature) use ($activeArray) {
                return in_array($productFeature->active, $activeArray);
            });

        Log::info($narrowedProductFeatures);


/*
        function printFeatures(array $items, $parentId, $result) {
            foreach ($items as $item) {
                if ($item["parent_id"] == $parentId) {
                    $result .= "<li>";
                    $result .= $item["feature"];
                    $result .= "<ul>";
                    $result = printFeatures($items, $item["id"], $result);
                    $result .= "</ul></li>";
                }
            }
            return $result;
        }
*/


        // Convert the model collection to a nested set of just the data we need,
        // before converting it to a JSON and sending it back.
        $productFeatures = Collection::make();
        $childIds = Collection::make();
        $narrowedProductFeatures->each(function ($featureItem, $key) use (&$narrowedProductFeatures, $productFeatures, &$childIds) {
            $tempFeature = collect($featureItem->only(['id', 'active', 'feature']));

            if (!$childIds->contains($tempFeature['id'])) { // If this `$featureItem` has _not_ been used in a previous iteration as a child.

                $childFeatures = $narrowedProductFeatures->filter(function ($feature) use ($tempFeature) {
                    if ($feature->productFeaturesPivot->isNotEmpty()) {
                        $match = $feature->productFeaturesPivot->firstWhere('parent_id', $tempFeature['id']);
                        Log::info($match);
                        return !is_null($match);
                    }
                    return false;
                });
                Log::info('$childFeatures:');
                Log::info($childFeatures);

                $filteredChildren = $childFeatures->map(function ($childFeature) {
                    Log::info(collect($childFeature->only(['id', 'active', 'feature'])));
                    return collect($childFeature->only(['id', 'active', 'feature']));
                });

                Log::info('$filteredChildren (outside):');
                Log::info($filteredChildren);
                if ($filteredChildren->isNotEmpty()) {
                    Log::info('$filteredChildren (inside):');
                    Log::info($filteredChildren);
                    $childIds = $filteredChildren->pluck('id');
                    $tempFeature['children'] = array($filteredChildren);
                }
                Log::info('$tempFeature this iteration:');
                Log::info($tempFeature);

                $productFeatures->push($tempFeature);
            }

        });

        Log::info('FINAL $productFeatures:');
        Log::info($productFeatures);

        return response()->json($productFeatures);


        /* Likely change all of the above to return a pre-made HTML string of all of the Features & Options
         * instead of fucking with Vue to make it work.
         *
         * Also do the same for everything else that is data-driven (that used to use an AJAX request in `acs-susy`.
         *
         * While working in here, go ahead and install/use `Prettier`.
         *
         * Also use a generated `.gitignore` as we did in `acs-susy` and `sky-schedule`.
         */
    }
}
