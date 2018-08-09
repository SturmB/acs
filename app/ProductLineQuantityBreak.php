<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductLineQuantityBreak extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_line_quantity_break';

    /**
     * ProductLine relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productLine()
    {
        return $this->belongsTo(ProductLine::class);
    }

    /**
     * QuantityBreak relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quantityBreak()
    {
        return $this->belongsTo(QuantityBreak::class);
    }
}
