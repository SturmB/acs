<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\AcsCharge
 *
 * @property int $id PK.
 * @property int $product_line_quantity_break_id The Product Line / Quantity Break foreign key for which an additional Charge will be applied.
 * @property string $charge_type_id The Charge Type foreign key for the Product Line / Quantity Break combo in snake_case.
 * @property string|null $amount The amount of the additional Charge in Decimal format.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\ChargeType $chargeType
 * @property-read \App\ProductLineQuantityBreak $productLineQuantityBreak
 * @method static \Illuminate\Database\Eloquent\Builder|AcsCharge newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AcsCharge newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AcsCharge query()
 * @method static \Illuminate\Database\Eloquent\Builder|AcsCharge whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcsCharge whereChargeTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcsCharge whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcsCharge whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcsCharge whereProductLineQuantityBreakId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcsCharge whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class AcsCharge extends \Eloquent {}
}

namespace App{
/**
 * App\AcsPrice
 *
 * @property int $id PK.
 * @property string $product_id Foreign key of the Product.
 * @property int $product_line_quantity_break_id Foreign key of the combined Product Line and Quantity Break.
 * @property string $price The price for a particular item (Product, Product Line, and Quantity Break.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Product $product
 * @property-read \App\ProductLineQuantityBreak $productLineQuantityBreak
 * @method static \Illuminate\Database\Eloquent\Builder|AcsPrice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AcsPrice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AcsPrice query()
 * @method static \Illuminate\Database\Eloquent\Builder|AcsPrice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcsPrice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcsPrice wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcsPrice whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcsPrice whereProductLineQuantityBreakId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcsPrice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class AcsPrice extends \Eloquent {}
}

namespace App{
/**
 * App\ChargeType
 *
 * @property string $id PK. The unique identifier for this Charge Type in snake_case.
 * @property string $short_name The snake_case short name which can also be used to identify the Charge Type.
 * @property string $long_name The long name used to display the Charge Type to the user.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\AcsCharge[] $acsCharges
 * @property-read int|null $acs_charges_count
 * @method static \Illuminate\Database\Eloquent\Builder|ChargeType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChargeType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChargeType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChargeType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChargeType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChargeType whereLongName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChargeType whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChargeType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ChargeType extends \Eloquent {}
}

namespace App{
/**
 * App\ClipartCategory
 *
 * @property string $id PK. The snake_case name of the Clipart Category.
 * @property int $active Whether or not the Clipart Category is active.
 * @property int $priority The order in which the Clipart Categories should appear. Lower numbers appear before higher numbers.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ClipartSubcategory[] $clipartSubcategories
 * @property-read int|null $clipart_subcategories_count
 * @method static \Illuminate\Database\Eloquent\Builder|ClipartCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClipartCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClipartCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClipartCategory whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClipartCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClipartCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClipartCategory wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClipartCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ClipartCategory extends \Eloquent {}
}

namespace App{
/**
 * App\ClipartSubcategory
 *
 * @property string $id PK. The snake_case name of the Clipart Subcategory. Doubles as the local folder name where the actual clipart resides.
 * @property int $active Whether or not the Clipart Subcategory is active.
 * @property string $clipart_category_id The Clipart Category to which this Subcategory belongs. Foreign key.
 * @property string $long_name The displayed name for the Clipart Subcategory, complete with spaces and capitalization.
 * @property int $priority The order in which the Clipart Subcategories should appear. Lower numbers appear before higher numbers.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\ClipartCategory $clipartCategory
 * @method static \Illuminate\Database\Eloquent\Builder|ClipartSubcategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClipartSubcategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClipartSubcategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClipartSubcategory whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClipartSubcategory whereClipartCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClipartSubcategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClipartSubcategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClipartSubcategory whereLongName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClipartSubcategory wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClipartSubcategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ClipartSubcategory extends \Eloquent {}
}

namespace App{
/**
 * App\Color
 *
 * @property int $id PK.
 * @property int $active Boolean value for whether or not the Color is active.
 * @property string $color_type_id Foreign key to denote what type of Color this is (Product, Standard Ink, Foil, etc.).
 * @property string $short_name The name of the Color. This is mostly used for the small swatches on the Product page. *THERE MAY BE MULTIPLE ENTRIES WITH THE SAME COLOR NAME.* This means that different manufacturers make the same color, but they have different shades. The differentiator will be the closest equivalent Pantone match, which is in the “pantone” column.
 * @property string $long_name The full name of the Color.
 * @property string|null $pantone The Pantone equivalent to the color name. This will vary from manufacturer to manufacturer.
 * @property string|null $hex The six-character hexadecimal color code used to represent the color on screen. Mainly used for color swatches.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\ColorType $colorType
 * @property-read string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PrintMethod[] $printMethods
 * @property-read int|null $print_methods_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color query()
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereColorTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereHex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereLongName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color wherePantone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Color extends \Eloquent {}
}

namespace App{
/**
 * App\ColorPrintMethod
 *
 * @property int $id PK.
 * @property string $print_method_id Foreign key for the Print Method in snake_case.
 * @property int $color_id Foreign key for the Color.
 * @property int $active Boolean value for whether or not the Color and Print Method combination are in active use.
 * @property int $priority Sort priority. Lower-numbered items appear before higher-numbered ones.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Color $colors
 * @property-read \App\PrintMethod $printMethods
 * @method static \Illuminate\Database\Eloquent\Builder|ColorPrintMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ColorPrintMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ColorPrintMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|ColorPrintMethod whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorPrintMethod whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorPrintMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorPrintMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorPrintMethod wherePrintMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorPrintMethod wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorPrintMethod whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ColorPrintMethod extends \Eloquent {}
}

namespace App{
/**
 * App\ColorProduct
 *
 * @property int $id PK.
 * @property string $product_id Foreign Key of the Product in the `products` table.
 * @property int $color_id Foreign Key of the Color in the `colors` table.
 * @property int $priority Priority. Used to display the Colors for a Product in a specific order. Lower numbers are higher in priority, so they should appear before higher (lower-priority) numbers.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Color $color
 * @property-read \App\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|ColorProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ColorProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ColorProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|ColorProduct whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorProduct wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ColorProduct extends \Eloquent {}
}

namespace App{
/**
 * App\ColorType
 *
 * @property string $id PK. The snake_case name of the Color Type.
 * @property int $active Boolean value for whether or not the Color Type is active.
 * @property string $long_name The long name of the Color Type. Mostly used for outputting as text to web page.
 * @property int $priority Priority value for sorting the color types. Lower values appear before higher values.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Color[] $colors
 * @property-read int|null $colors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductLine[] $productLines
 * @property-read int|null $product_lines_count
 * @method static \Illuminate\Database\Eloquent\Builder|ColorType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ColorType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ColorType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ColorType whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorType whereLongName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorType wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ColorType extends \Eloquent {}
}

namespace App{
/**
 * App\CouponCode
 *
 * @property string $id PK. The coupon code.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductLine[] $productLines
 * @property-read int|null $product_lines_count
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class CouponCode extends \Eloquent {}
}

namespace App{
/**
 * App\ImprintType
 *
 * @property string $id PK. The snake_case name of the Imprint Type.
 * @property int $active Boolean value for whether or not the Imprint Type is actively used.
 * @property string|null $title The name of the Imprint Type. Preferably only 1–5 words. HTML is allowed.
 * @property string|null $body A description of the Imprint Type. This will make up the body of the note that will be displayed on the web page. HTML structuring allowed.
 * @property int $priority The order in which the Imprint Types should be listed when displayed to the user, from low to high. (Lower numbers appear earlier.)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductLine[] $productLines
 * @property-read int|null $product_lines_count
 * @method static \Illuminate\Database\Eloquent\Builder|ImprintType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImprintType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImprintType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ImprintType whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImprintType whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImprintType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImprintType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImprintType wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImprintType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImprintType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ImprintType extends \Eloquent {}
}

namespace App{
/**
 * App\MenuCategory
 *
 * @property string $id The name of the Menu Category. Ties together with the priority column.
 * @property int $active Boolean value for whether or not the Menu Category is active (will be shown).
 * @property string $long_name
 * @property int $priority Grouping and Priority in one column! This is for the navigation list (usually a navbar), with higher numbers appearing later in the list.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductCategory[] $productCategories
 * @property-read int|null $product_categories_count
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory whereLongName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class MenuCategory extends \Eloquent {}
}

namespace App{
/**
 * App\PrintMethod
 *
 * @property string $id PK. The short name of the Print Method in snake_case. i.e., “tradition”.
 * @property int $active Boolean value for whether or not the Print Method is active.
 * @property string|null $hex Hexadecimal representing the color associated with the Print Method.
 * @property string|null $long_name The long name of the Print Method. i.e., “American Traditions”.
 * @property string|null $prefix The prefix used in combination with the id of a Product.
 * @property string|null $short_description A short, one-sentence description of the Print Method.
 * @property string|null $long_description A long description of the Print Method; generally one paragraph in length.
 * @property int $priority The order in which Print Methods should be listed when displayed to the user, from low to high. (Lower numbers appear earlier.)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Color[] $colors
 * @property-read int|null $colors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductLine[] $productLines
 * @property-read int|null $product_lines_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethod whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethod whereHex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethod whereLongDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethod whereLongName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethod wherePrefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethod wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethod whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethod whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class PrintMethod extends \Eloquent {}
}

namespace App{
/**
 * App\PrintMethodProduct
 *
 * @property int $id PK.
 * @property int $active Boolean value for whether or not the Product-Print Method combo is active.
 * @property string $product_id Foreign key of the id of the Product.
 * @property string $print_method_id Foreign key of the Print Method.
 * @property int $package_count Number of Products in a package (usually shrink-wrapped). *1 indicates "individual"*. *0 indicates "bulk"*
 * @property float|null $imprint_width The width of the imprint area. NULL typically means it is an unprinted item, such as a lid or straw. If there is a value in this column while the imprint_height column is NULL, then it is likely that this number is a diameter. *A value of 0 means "See Template," -1 means "User Supplied," and -2 means "1/8 in. over actual."*
 * @property float|null $imprint_height The height of the imprint area. NULL typically means it is an unprinted item, such as a lid or straw. If this is NULL while there is a value in the imprint_width column, then it is likely that number is a diameter.
 * @property float|null $imprint_bleed_wrap_width The width of the "bleed" imprint area on a flat item or "wrap" imprint area of a cup. NULL typically means that the product does not have a bleed or wrap imprint area possible. *A value of 0 means "See Template," -1 means "User Supplied," and -2 means "1/8 in. over actual."*
 * @property float|null $imprint_bleed_wrap_height The height of the "bleed" imprint area on a flat item or "wrap" imprint area of a cup. NULL typically means either the item is a cup and the wrap width is in the "imprint_bleed_wrap_width" field or the number in that field represents a diameter for a flat item. A NULL in *both* fields means the item does not have a bleed nor wrap imprint area.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\PrintMethod $printMethod
 * @property-read \App\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethodProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethodProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethodProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethodProduct whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethodProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethodProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethodProduct whereImprintBleedWrapHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethodProduct whereImprintBleedWrapWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethodProduct whereImprintHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethodProduct whereImprintWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethodProduct wherePackageCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethodProduct wherePrintMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethodProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintMethodProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class PrintMethodProduct extends \Eloquent {}
}

namespace App{
/**
 * App\Product
 *
 * @property string $id PK. The short name of the Product in snake_case.
 * @property int $active Boolean value for whether or not the Product is active.
 * @property int $product_subcategory_id Foreign key of the Product Subcategory to which this Product belongs.
 * @property string $name The item number (or name) as shown in the catalog WITHOUT the Print Method prefix.
 * @property string $description Description of the Product as shown in the catalog.
 * @property int|null $priority The order in which the Products should appear. Lower numbers appear before higher numbers.
 * @property int $case_quantity Number of Products in a case (or box).
 * @property int $case_weight The weight of the Product case in pounds.
 * @property int $case_dim_weight The "Dimensional Weight" of the Product case in pounds. (Not the _actual_ weight.)
 * @property int $case_length Length of the Product case.
 * @property int $case_width Width of the Product case.
 * @property int $case_height Height of the Product case.
 * @property float|null $dim_top The dimension of the top of the Product in inches. (Usually a diameter.) NULL typically means it is a flat item and often will display as "N/A"; see `item_width` and `item_height`. 0 is "See Template" and -1 is "User Supplied".
 * @property float|null $dim_height The dimension of the height of the Product in inches. NULL typically means it is a flat item and often will display as "N/A"; see `item_width` and `item_height`. 0 is "See Template" and -1 is "User Supplied".
 * @property float|null $dim_base The dimension of the bottom (or base) of the Product in inches. (Usually a diameter.) NULL typically means it is a flat item and often will display as "N/A"; see `item_width` and `item_height`. 0 is "See Template" and -1 is "User Supplied".
 * @property string|null $shape_id The Shape of the Product. Foreign key.
 * @property string|null $thickness_id The Thickness of the Product. Foreign key.
 * @property float|null $area The area in square inches of the Product. Currently used only for shaped items. NULL means the area is not used for the Product.
 * @property float|null $item_width The width of the Product. NULL typically means it is _not_ a flat item. One dimension typically means it is a diameter and often will display as "N/A" (e.g., round Coasters). 0 is "See Template" and -1 is "User Supplied".
 * @property float|null $item_height The height of the Product. NULL typically means it is *not* a flat item. One dimension typically means it is a diameter and often will display as "N/A" (e.g., round Coasters). 0 is "See Template" and -1 is "User Supplied".
 * @property int $pallet_quantity The number of Product cases (boxes) that ship on a single pallet.
 * @property int $pallet_length The length of the pallet in inches when fully loaded with Product cases.
 * @property int $pallet_width The width of the pallet in inches when fully loaded with Product cases.
 * @property int $pallet_height The height of the pallet in inches when fully loaded with Product cases.
 * @property int $pallet_weight The weight of the pallet in pounds when fully loaded with Product cases.
 * @property int|null $class_code The class code of the Product.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\AcsPrice[] $acsPrices
 * @property-read int|null $acs_prices_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Color[] $colors
 * @property-read int|null $colors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PrintMethod[] $printMethods
 * @property-read int|null $print_methods_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductLineQuantityBreak[] $productLineQuantityBreaks
 * @property-read int|null $product_line_quantity_breaks_count
 * @property-read \App\ProductSubcategory $productSubcategory
 * @property-read \App\Shape|null $shape
 * @property-read \App\Thickness|null $thickness
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCaseDimWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCaseHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCaseLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCaseQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCaseWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCaseWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereClassCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDimBase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDimHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDimTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereItemHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereItemWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePalletHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePalletLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePalletQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePalletWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePalletWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereShapeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereThicknessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Product extends \Eloquent {}
}

namespace App{
/**
 * App\ProductCategory
 *
 * @property string $id PK. The short name of the Product Category.
 * @property int $active Boolean value for whether or not the Product Category is active.
 * @property string $long_name The long name of the Product Category.
 * @property string|null $text_notes Text notes (if any) that appear below the “Features & Options” list on the Product page.
 * @property string $menu_category_id Foreign key of the name of the Menu Category to which the Product Category belongs.
 * @property int $priority The order in which Product Categories should be listed when displayed to the user, from low to high. (Lower numbers appear earlier.)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\MenuCategory $menuCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductSubcategory[] $productSubcategories
 * @property-read int|null $product_subcategories_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereLongName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereMenuCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereTextNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ProductCategory extends \Eloquent {}
}

namespace App{
/**
 * App\ProductFeature
 *
 * @property int $id PK.
 *                 Also serves as the priority of the feature/option. The higher the priority, the higher on the list it should appear.
 * 
 *                 29000s and up: Highest priority stuff.
 *                 28000s: Imprint method count.
 *                 27000s: Individual imprint methods.
 *                     27600-28000: First, main print method detail.
 *                     27300s: Die methods.
 *                 26000s: Ink & color info.
 *                 25000s: “Optional” info.
 *                 10000-12000: Number of colors possible.
 *                 1000-10000: Item-specific info.
 *                     1000-2999: Napkins.
 *                         2000s: Ply count.
 *                         1000s: Other info.
 *                     3000s: Coasters.
 *                     4000s: Drink Stirrers, Food Piks, & Ice Cream Spoons.
 *                     5000s: Plates.
 *                     6000-7999: Cups.
 *                     <1000: Bottom of the list stuff.
 * @property int $active Boolean value for whether or not the Product Feature is active.
 * @property string $feature A feature or option for a Product Line.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductFeaturePivot[] $productFeaturesPivot
 * @property-read int|null $product_features_pivot_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductLine[] $productLines
 * @property-read int|null $product_lines_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeature query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeature whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeature whereFeature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeature whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ProductFeature extends \Eloquent {}
}

namespace App{
/**
 * App\ProductFeaturePivot
 *
 * @property int $id PK.
 * @property int $parent_id Foreign key of the id of the parent Product Feature from the same table.
 * @property int $feature_id Foreign key that represents a sub-feature.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeaturePivot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeaturePivot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeaturePivot query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeaturePivot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeaturePivot whereFeatureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeaturePivot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeaturePivot whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeaturePivot whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ProductFeaturePivot extends \Eloquent {}
}

namespace App{
/**
 * App\ProductLine
 *
 * @property int $id PK.
 * @property int $active Boolean value for whether or not the Product Line (Subcategory/Method combination) is active.
 * @property int $product_subcategory_id Foreign key of the Product Subcategory.
 * @property string $print_method_id Foreign key of the Print Method.
 * @property string $coupon_code_id Foreign key to denote the Coupon Code for the Product Line (Subcategory/Method combination).
 * @property int $second_side Boolean value for whether or not the Product Line (Subcategory/Method combo) has a second side that’s printable. (Called “per panel” for offset napkins.)
 * @property int $wrap Boolean value for whether or not the Product Line (Subcategory/Method combo) has the capability to be printed as a wrap (first and second side together).
 * @property int $bleed Boolean value for whether or not the Product Line (Subcategory/Method combo) has the capability to be printed as a bleed.
 * @property int $multicolor Boolean value for whether or not the Product Line (Subcategory/Method combo) can be printed with more than one color. (Digital method irrelevant for determining the “per color” tag.)
 * @property int $process Boolean value for whether or not the Product Line (Subcategory/Method combo) can be printed with 4 Color Process. Typically only for Tradition Print Methods.
 * @property int $white_ink Boolean value for whether or not the Product Line (Subcategory/Method combo) has a White Ink surcharge. Typically only for Digitally-printed Coasters and Beverage Wraps.
 * @property int $hotstamp Boolean value for whether or not the Product Line (Subcategory/Method combo) has a Hotstamp imprint surcharge. Typically only for Coasters and Beverage Wraps.
 * @property int $per_thousand True/False. True if the prices for this Product Line (Subcategory/Method combo) are measured per thousand.
 * @property int $setup_charge Amount to charge for setup.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\AcsPrice[] $acsPrices
 * @property-read int|null $acs_prices_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ColorType[] $colorTypes
 * @property-read int|null $color_types_count
 * @property-read \App\CouponCode $couponCode
 * @property-read string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ImprintType[] $imprintTypes
 * @property-read int|null $imprint_types_count
 * @property-read \App\PrintMethod $printMethod
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductFeature[] $productFeatures
 * @property-read int|null $product_features_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductLineQuantityBreak[] $productLineQuantityBreaks
 * @property-read int|null $product_line_quantity_breaks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductNote[] $productNotes
 * @property-read int|null $product_notes_count
 * @property-read \App\ProductSubcategory $productSubcategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\QuantityBreak[] $quantityBreaks
 * @property-read int|null $quantity_breaks_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLine query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLine whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLine whereBleed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLine whereCouponCodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLine whereHotstamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLine whereMulticolor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLine wherePerThousand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLine wherePrintMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLine whereProcess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLine whereProductSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLine whereSecondSide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLine whereSetupCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLine whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLine whereWhiteInk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLine whereWrap($value)
 * @mixin \Eloquent
 */
	class ProductLine extends \Eloquent {}
}

namespace App{
/**
 * App\ProductLineQuantityBreak
 *
 * @property int $id PK.
 * @property int $active Boolean value for whether or not the Product Line / Quantity combo is active.
 * @property int $product_line_id Foreign key for the Product Line.
 * @property int $quantity_break_id Foreign key denoting which Quantity Break to use.
 * @property string|null $additional_color_charge The price for an additional color for the Quantity Break, or NULL if there are no additional color charges for the Product Line.
 * @property string|null $second_side_charge The price to imprint the second side of the item, or NULL if the item cannot be printed on a second side.
 * @property string|null $process_charge The price for printing using a 4-color process method, or NULL if this Product Line does not charge for 4-color process printing.
 * @property string|null $bleed_charge The price for printing full bleed, or NULL if this Product Line does not allow for full bleed printing.
 * @property string|null $white_ink_charge The price for printing white ink, or NULL if this Product Line does not allow for white ink printing. Typically only used for Coasters and Beverage Wraps.
 * @property string|null $hotstamp_charge The price for a hotstamp imprint, or NULL if this Product Line does not allow for hotstamping. Typically only used for Coasters and Beverage Wraps.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\AcsCharge[] $acsCharges
 * @property-read int|null $acs_charges_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\AcsPrice[] $acsPrices
 * @property-read int|null $acs_prices_count
 * @property-read string $product_line_quantity
 * @property-read \App\ProductLine $productLine
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read int|null $products_count
 * @property-read \App\QuantityBreak $quantityBreak
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLineQuantityBreak newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLineQuantityBreak newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLineQuantityBreak query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLineQuantityBreak whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLineQuantityBreak whereAdditionalColorCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLineQuantityBreak whereBleedCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLineQuantityBreak whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLineQuantityBreak whereHotstampCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLineQuantityBreak whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLineQuantityBreak whereProcessCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLineQuantityBreak whereProductLineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLineQuantityBreak whereQuantityBreakId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLineQuantityBreak whereSecondSideCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLineQuantityBreak whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLineQuantityBreak whereWhiteInkCharge($value)
 * @mixin \Eloquent
 */
	class ProductLineQuantityBreak extends \Eloquent {}
}

namespace App{
/**
 * App\ProductNote
 *
 * @property string $id The short name of the text note.
 * @property int $active Boolean value for whether or not the Note is active.
 * @property string|null $title The title of the note. Preferably only 1–5 words. HTML is allowed.
 * @property string|null $body The body of the note that will be displayed on the web page, with HTML structuring.
 * @property int $priority The order in which Notes should be listed when displayed to the user, from low to high. (Lower numbers appear earlier.)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductLine[] $productLines
 * @property-read int|null $product_lines_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductNote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductNote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductNote query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductNote whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductNote whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductNote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductNote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductNote wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductNote whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductNote whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ProductNote extends \Eloquent {}
}

namespace App{
/**
 * App\ProductSubcategory
 *
 * @property int $id PK.
 * @property int $active Boolean value for whether or not the Product Subcategory is active.
 * @property string $product_category_id The foreign key of the main Product Category to which this Subcategory belongs.
 * @property string $short_name The short name of the Product Subcategory.
 * @property string $long_name The long name of the Product Subcategory.
 * @property string|null $subhead The subheading that typically appears immediately after the `long_name`.
 * @property int $priority The order in which Product Subcategories should be listed when displayed to the user, from low to high. (Lower numbers appear earlier.)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\ProductCategory $productCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductLine[] $productLines
 * @property-read int|null $product_lines_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory whereLongName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory whereSubhead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ProductSubcategory extends \Eloquent {}
}

namespace App{
/**
 * App\QuantityBreak
 *
 * @property int $id PK. Quantity breakpoint.
 * @property int $active Boolean value for whether or not the Quantity Break is active.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProductLine[] $productLines
 * @property-read int|null $product_lines_count
 * @method static \Illuminate\Database\Eloquent\Builder|QuantityBreak newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuantityBreak newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuantityBreak query()
 * @method static \Illuminate\Database\Eloquent\Builder|QuantityBreak whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuantityBreak whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuantityBreak whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuantityBreak whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class QuantityBreak extends \Eloquent {}
}

namespace App{
/**
 * App\Shape
 *
 * @property string $id PK. The Shape. Please use snake_case.
 * @property string $long_name The display name of the Shape. Symbols and spaces allowed.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Shape newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shape newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shape query()
 * @method static \Illuminate\Database\Eloquent\Builder|Shape whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shape whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shape whereLongName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shape whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Shape extends \Eloquent {}
}

namespace App{
/**
 * App\Thickness
 *
 * @property string $id PK. The Thickness. Please use snake_case.
 * @property string $long_name The display name of the Thickness. Symbols and spaces allowed.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Thickness newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Thickness newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Thickness query()
 * @method static \Illuminate\Database\Eloquent\Builder|Thickness whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thickness whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thickness whereLongName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thickness whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Thickness extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property int|null $role_id
 * @property string $name
 * @property string $email
 * @property string|null $avatar
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $settings
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property mixed $locale
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \TCG\Voyager\Models\Role|null $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\TCG\Voyager\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

