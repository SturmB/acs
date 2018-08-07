<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintMethodProduct extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'print_method_product';

    /**
     * PrintMethod relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function printMethod()
    {
        return $this->belongsTo(PrintMethod::class);
    }

    /**
     * Product relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
