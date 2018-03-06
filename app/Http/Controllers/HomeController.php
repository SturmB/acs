<?php

namespace App\Http\Controllers;

use App\ProductLine;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the home page.
     *
     * @param string $includeInactive
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($includeInactive = '')
    {
        // Set whether or not to include inactive items on the page (including in the navbar).
        $activeArray = [$includeInactive === 'include_inactive' ? 0 : 1, 1];

        // Get the menu items from the database.
        $menuItems = ProductLine::with(['productSubcategory.productCategory.menuCategory', 'printMethod'])->get();

        // Only keep "active" items if variable is set to do so (by default, it is).
        // Also only keep items with the
        $filteredMenuItems = $menuItems->groupBy('product_subcategory_id')
            ->map(function ($productLineGroup) use ($activeArray) {
                $printMethodActive = $productLineGroup->filter(function ($productLine) use ($activeArray) {
                    return in_array($productLine->printMethod->active, $activeArray);
                });
                $menuActive = $printMethodActive->filter(function ($productLine) use ($activeArray) {
                    return in_array($productLine->productSubcategory->productCategory->menuCategory->active, $activeArray);
                });
                $catActive = $menuActive->filter(function ($productLine) use ($activeArray) {
                    return in_array($productLine->productSubcategory->productCategory->active, $activeArray);
                });
                $subcatActive = $catActive->filter(function ($productLine) use ($activeArray) {
                    return in_array($productLine->productSubcategory->active, $activeArray);
                });
                $min = $subcatActive->min('printMethod.priority');
                $prioritized = $subcatActive->filter(function ($productLine) use ($min) {
                    return $productLine->printMethod->priority === $min;
                });
                return $prioritized;
            })
            ->flatten(1);

//        dd($filteredMenuItems);


        // Sort and group the items, ready for building the HTML navbar.
        $groupedMenu = $filteredMenuItems->sortBy(function ($item) { // Sort the items by all three criteria.
            $sortNum = $item->productSubcategory->productCategory->menuCategory->priority * 100;
            $sortNum += $item->productSubcategory->productCategory->priority * 10;
            $sortNum += $item->productSubcategory->priority;
            return $sortNum;
        })->groupBy('productSubcategory.productCategory.menu_category_id');


        // Prepare the HTML navbar.
        $productsHtml = '';
        $previousCategory = null;
        foreach ($groupedMenu as $mainMenuGroup) {
            $productsHtml .= "<li class='nav-item dropdown'>" . PHP_EOL;
            $productsHtml .= "    <a class='nav-link dropdown-toggle' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" . PHP_EOL;
            $productsHtml .= $mainMenuGroup->first()->productSubcategory->productCategory->menu_category_id . PHP_EOL;
            $productsHtml .= "    </a>" . PHP_EOL;
            $productsHtml .= "    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>" . PHP_EOL;
            foreach ($mainMenuGroup as $menuItem) {
                $productsHtml .= "        <a class='dropdown-item' href='";
                $productsHtml .= $menuItem->productSubcategory->product_category_id . "/";
                $productsHtml .= $menuItem->productSubcategory->short_name . "/";
                $productsHtml .= $menuItem->print_method_id;
                $productsHtml .= "'>" . PHP_EOL;
                $productsHtml .= $menuItem->productSubcategory->long_name . PHP_EOL;
                $productsHtml .= "        </a>" . PHP_EOL;
            }
            $productsHtml .= "    </div>" . PHP_EOL;
            $productsHtml .= "</li>" . PHP_EOL;
        }

//        dd($productsHtml);


        // Get clipart menu.
        $clipartPath = public_path('storage/images/clipart/');
        $subfolders = glob($clipartPath . '*', GLOB_ONLYDIR);

        $clipartHtml = '';

        if (count($subfolders) > 0) {
            $clipartHtml .= "<li class='nav-item dropdown'>" . PHP_EOL;
            $clipartHtml .= "   <a class='nav-link dropdown-toggle' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" . PHP_EOL;
            $clipartHtml .= "Clip-Art" . PHP_EOL;
            $clipartHtml .= "   </a>" . PHP_EOL;
            $clipartHtml .= "   <div class='dropdown-menu' aria-labelledby='navbarDropdown'>" . PHP_EOL;
            foreach ($subfolders as $dirty_name) {
                $exploded_name = explode('/', $dirty_name);
                $folder_name = array_pop($exploded_name);
                $capped_name = ucwords($folder_name);
                $clipartHtml .= "        <a class='dropdown-item'";
                $clipartHtml .= " href='clipart/{$folder_name}'";
                $clipartHtml .= " target='_self'";
                $clipartHtml .= " title='{$capped_name}'>" . PHP_EOL;
                $clipartHtml .= $capped_name . "\n";
            $clipartHtml .= "            </a>" . PHP_EOL;
            }
            $clipartHtml .= "   </div>" . PHP_EOL;
            $clipartHtml .= "</li>" . PHP_EOL;
        }

//        dd($clipartHtml);

        return view('home', compact('productsHtml', 'clipartHtml'));
    }
}
