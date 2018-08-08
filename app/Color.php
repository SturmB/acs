<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public $additional_attributes = ['name'];

    public function getNameAttribute()
    {
        return $this->color_type_id . '_' . strtolower(str_replace(['/', ' ', '*'], ['_', '_', ''], $this->short_name));
    }

    /**
     * Color Type relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function colorType()
    {
        return $this->belongsTo(ColorType::class);
    }

    /**
     * Product relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('priority')
            ->withTimestamps();
    }
}
