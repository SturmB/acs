<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSubcategory extends Model
{
    /**
     * ProductCategory relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
