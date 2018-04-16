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
//        Log::info('original:');
//        Log::info(json_encode($this->menuItems));
        // Only keep "active" items if variable is set to do so (by default, it is).
        // Also only keep items with the
        return $this->menuItems->groupBy('product_subcategory_id')
            ->map(function ($productLineGroup) use ($activeArray) {
                // Filter to only the Print Methods that are active.
                $printMethodActive = $productLineGroup->filter(function ($productLine) use ($activeArray) {
                    return in_array($productLine->printMethod->active, $activeArray);
                });
                // Filter to only the Menu Categories that are active.
                $menuActive = $printMethodActive->filter(function ($productLine) use ($activeArray) {
                    return in_array($productLine->productSubcategory->productCategory->menuCategory->active, $activeArray);
                });
                // Filter to only the Categories that are active.
                $catActive = $menuActive->filter(function ($productLine) use ($activeArray) {
                    return in_array($productLine->productSubcategory->productCategory->active, $activeArray);
                });
                // Filter to only the Subcategories that are active.
                $subcatActive = $catActive->filter(function ($productLine) use ($activeArray) {
                    return in_array($productLine->productSubcategory->active, $activeArray);
                });
                return $subcatActive;
                // Filter to only the highest-priority Print Method per item.
/*                $min = $subcatActive->min('printMethod.priority');
                $prioritized = $subcatActive->filter(function ($productLine) use ($min) {
                    return $productLine->printMethod->priority === $min;
                });
                return $prioritized;*/
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
        Log::info('filtered:');
        Log::info($menuItems);
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
            $html .= "<li><span>";
            $html .= $mainMenuGroup->first()->productSubcategory->productCategory->menu_category_id;
            $html .= "</span>" . PHP_EOL;
            $html .= "    <div class='flexinav_ddown flexinav_ddown_fly_out flexinav_ddown_240'>" . PHP_EOL;
            $html .= "        <ul class='dropdown_flyout'>" . PHP_EOL;
            foreach ($mainMenuGroup as $menuItem) {
                $product_category_id = $menuItem->productSubcategory->product_category_id;
                $short_name = $menuItem->productSubcategory->short_name;
                $html .= "            <li><a class='dropdown-item' href='/products/{$product_category_id}/{$short_name}' target='_self'>";
                $html .= $menuItem->productSubcategory->long_name;
                $html .= "            </a></li>" . PHP_EOL;
            }
            $html .= "        </ul>" . PHP_EOL;
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
            $html .= "<li><span>Clip-Art</span>" . PHP_EOL;
            $html .= "   <div class='flexinav_ddown flexinav_ddown_fly_out flexinav_ddown_240'>" . PHP_EOL;
            $html .= "      <ul class='dropdown_flyout'>" . PHP_EOL;
            foreach ($subfolders as $dirty_name) {
                $exploded_name = explode('/', $dirty_name);
                $folder_name = array_pop($exploded_name);
                $capped_name = ucwords($folder_name);
                $html .= "        <li><a href='clipart/{$folder_name}' target='_self' title='{$capped_name}'>";
                $html .= $capped_name;
                $html .= "        </a></li>" . PHP_EOL;
            }
            $html .= "      </ul>" . PHP_EOL;
            $html .= "   </div>" . PHP_EOL;
            $html .= "</li>" . PHP_EOL;
        }

        return $html;
    }
}