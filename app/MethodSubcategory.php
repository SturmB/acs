<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MethodSubcategory extends Model
{
    use \LaravelTreats\Model\Traits\HasCompositePrimaryKey;

    /**
     * Indicates if the primary key is an auto-incrementing integer.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Defines the data type of the primary key.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Defines the primary key field(s).
     * May only be usable when Laravel Treats is installed.
     *
     * @var array
     */
    protected $primaryKey = ['print_method_id', 'product_subcategory_id', 'product_category_id'];

    /**
     * Get the Product Subcategory for a given Print Method/Product Subcategory combo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productSubcategory()
    {
        return $this->belongsTo('App\ProductSubcategory');
    }

    /**
     * Get the Product Category for a given Print Method/Product Subcategory combo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCategory()
    {
        return $this->belongsTo('App\ProductCategory');
    }

    /**
     * Get the Print Method for a given Print Method/Product Subcategory combo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function printMethod()
    {
        return $this->belongsTo('App\PrintMethod');
    }

}
