<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSubcategory extends Model
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
    protected $primaryKey = ['id', 'product_category_id'];

    /**
     * Get the main product category for a given subcategory.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCategory()
    {
        return $this->belongsTo('App\ProductCategory');
    }
}
