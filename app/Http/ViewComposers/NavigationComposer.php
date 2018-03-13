<?php
/**
 * Created by PhpStorm.
 * User: apache
 * Date: 3/8/18
 * Time: 4:55 PM
 */

namespace App\Http\ViewComposers;


use App\ProductLine;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class NavigationComposer
{
    /**
     * Boolean for whether or not to include inactive items.
     *
     * @var bool
     */
    protected $includeInactive;

    /**
     * Array used for getting active & inactive items from db.
     *
     * @var array
     */
    protected $activeArray;

    /**
     * The menu items from the database.
     *
     * @var \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    protected $menuItems;


    /**
     * NavigationComposer constructor.
     * Create a new navigation composer.
     *
     * @return void
     */
    public function __construct()
    {
        // Set whether or not to include inactive items in the navbar.
        $this->includeInactive = request()->route()->parameter('includeInactive') === 'include_inactive';
        $this->activeArray = [$this->includeInactive ? 0 : 1, 1];

        // Get the menu items from the database.
        $this->menuItems = ProductLine::with(['productSubcategory.productCategory.menuCategory', 'printMethod'])->get();
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $filteredMenuItems = $this->filterResults($this->activeArray);
        $groupedMenu = $this->sortAndGroup($filteredMenuItems);
        $productsHtml = $this->prepareProductMenu($groupedMenu);
        $clipartHtml = $this->prepareClipartMenu();

        $view->with(compact('productsHtml', 'clipartHtml'));
    }

    /**
     * Take the ProductLine model and its related models,
     * filtering them to only keep the subcategory/method combo
     * that has the highest PrintMethod priority.
     *
     * @param $activeArray
     * @return \Illuminate\Support\Collection|static
     */
    private function filterResults($activeArray)
    {
        // Only keep "active" items if variable is set to do so (by default, it is).
        // Also only keep items with the
        return $this->menuItems->groupBy('product_subcategory_id')
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
    }

    /**
     * Sort the remaining items by their various priorities (MenuCategory,
     * ProductCategory, and ProductSubcategory), then group them by MenuCategory.
     *
     * @param $menuItems
     * @return mixed
     */
    private function sortAndGroup($menuItems)
    {
        // Sort and group the items, ready for building the HTML navbar.
        return $menuItems->sortBy(function ($item) { // Sort the items by all three criteria.
            $sortNum = $item->productSubcategory->productCategory->menuCategory->priority * 100;
            $sortNum += $item->productSubcategory->productCategory->priority * 10;
            $sortNum += $item->productSubcategory->priority;
            return $sortNum;
        })->groupBy('productSubcategory.productCategory.menu_category_id');
    }

    /**
     * Take a grouped list of MenuCategories and all of the ProductCategories
     * and ProductSubcategories they contain and build up
     * Bootstrap 4-compatible navbar entries from them.
     *
     * @param $menuItems
     * @return string
     */
    private function prepareProductMenu($menuItems)
    {
        // Prepare the HTML navbar.
        $html = '';
        $previousCategory = null;
        foreach ($menuItems as $mainMenuGroup) {
            $html .= "<li class='nav-item dropdown'>" . PHP_EOL;
            $html .= "    <a class='nav-link dropdown-toggle' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" . PHP_EOL;
            $html .= $mainMenuGroup->first()->productSubcategory->productCategory->menu_category_id . PHP_EOL;
            $html .= "    </a>" . PHP_EOL;
            $html .= "    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>" . PHP_EOL;
            foreach ($mainMenuGroup as $menuItem) {
                $html .= "        <a class='dropdown-item' href='/products/";
                $html .= $menuItem->productSubcategory->product_category_id . "/";
                $html .= $menuItem->productSubcategory->short_name;
                $html .= "'>" . PHP_EOL;
                $html .= $menuItem->productSubcategory->long_name . PHP_EOL;
                $html .= "        </a>" . PHP_EOL;
            }
            $html .= "    </div>" . PHP_EOL;
            $html .= "</li>" . PHP_EOL;
        }

        return $html;
    }

    /**
     * Scan through the `images/clipart` folder and build up
     * Bootstrap 4-compatible navbar entries from them.
     *
     * @return string
     */
    private function prepareClipartMenu()
    {
        // Get clipart menu.
        $clipartPath = public_path('storage/images/clipart/');
        $subfolders = glob($clipartPath . '*', GLOB_ONLYDIR);

        $html = '';

        if (count($subfolders) > 0) {
            $html .= "<li class='nav-item dropdown'>" . PHP_EOL;
            $html .= "   <a class='nav-link dropdown-toggle' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" . PHP_EOL;
            $html .= "Clip-Art" . PHP_EOL;
            $html .= "   </a>" . PHP_EOL;
            $html .= "   <div class='dropdown-menu' aria-labelledby='navbarDropdown'>" . PHP_EOL;
            foreach ($subfolders as $dirty_name) {
                $exploded_name = explode('/', $dirty_name);
                $folder_name = array_pop($exploded_name);
                $capped_name = ucwords($folder_name);
                $html .= "        <a class='dropdown-item'";
                $html .= " href='clipart/{$folder_name}'";
                $html .= " target='_self'";
                $html .= " title='{$capped_name}'>" . PHP_EOL;
                $html .= $capped_name . "\n";
                $html .= "            </a>" . PHP_EOL;
            }
            $html .= "   </div>" . PHP_EOL;
            $html .= "</li>" . PHP_EOL;
        }

        return $html;
    }
}