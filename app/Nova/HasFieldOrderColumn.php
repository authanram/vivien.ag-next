<?php

namespace App\Nova;

use Laravel\Nova\Fields\Number;

trait HasFieldOrderColumn
{
    public function orderColumn(string $translation = 'Position', string $attribute = 'order_column'): Number
    {
        return Number::make(__($translation), $attribute)
            ->min(1)
            ->rules('required', 'numeric')
            ->sortable()
            ->showOnCreating(false)
            ->hideFromIndex()
            ->showOnPreview();
    }
}
