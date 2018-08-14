<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class AcsCharge extends Model
{
    /**
     * ChargeType relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chargeType()
    {
        return $this->belongsTo(ChargeType::class);
    }

    /**
     * ProductLineQuantityBreak relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productLineQuantityBreak()
    {
        return $this->belongsTo(ProductLineQuantityBreak::class);
    }
}
