<?php

namespace App\Http\Controllers;

use App\ProductLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

/*
        $buttonsHtml = "";
        if ($productLines->first()->print_method_id !== 'unprinted') {
            $buttonsHtml .= "<h4 class='accented'>printed with:</h4>" . PHP_EOL;
            foreach ($productLines as $productLine) {
                $selected = $productLine->printMethod->priority !== $minPriority ? "" : " selected";
                $buttonsHtml .= "<a href='#' id='link-{$productLine->print_method_id}' class='method-button{$selected}' data-method='{$productLine->print_method_id}'>" . PHP_EOL;
                $buttonsHtml .= "   <h1>";
                $buttonsHtml .= $productLine->printMethod->long_name;
                $buttonsHtml .= "   </h1>" . PHP_EOL;
                $buttonsHtml .= "   <h5>";
                $buttonsHtml .= $productLine->printMethod->short_description;
                $buttonsHtml .= "   </h5>" . PHP_EOL;
                $buttonsHtml .= "</a>" . PHP_EOL;
            }
        }
*/


        return view('product', compact('productLines', 'minPriority'));
    }
}
