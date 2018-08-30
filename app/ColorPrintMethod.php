<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ColorPrintMethod extends Pivot
{
    /**
     * Print Method relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function printMethods()
    {
        return $this->belongsTo(PrintMethod::class);
    }

    /**
     * Color relationship setup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function colors()
    {
        return $this->belongsTo(Color::class);
    }
}
