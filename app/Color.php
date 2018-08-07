<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    /**
     * Color Type relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function colorType()
    {
        return $this->belongsTo(ColorType::class);
    }
}
