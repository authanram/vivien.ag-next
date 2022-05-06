<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Slug;

trait HasViewBlocksPivotFields
{
    public function getViewBlocksPivotFields(): array
    {
        return [
            Slug::make(__('Slug'), 'slug')
                ->required()
                ->hideFromIndex(),
            Number::make(__('Order Column'), 'order_column')
                ->required(),
            Boolean::make(__('Published'), 'published')
                ->sortable()
                ->showOnPreview()
            ,
        ];
    }
}
