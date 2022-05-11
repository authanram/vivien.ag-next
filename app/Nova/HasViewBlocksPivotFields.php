<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Number;

trait HasViewBlocksPivotFields
{
    public function getViewBlocksPivotFields(): array
    {
        return [
            Number::make(__('Order Column'), 'order_column')
                ->rules('required'),
            Boolean::make(__('Published'), 'published')
                ->sortable()
                ->showOnPreview()
            ,
        ];
    }
}
