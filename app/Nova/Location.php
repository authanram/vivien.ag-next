<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Location extends Resource
{
    protected static array $orderBy = ['name' => 'asc'];

    public static string $model = \App\Models\Location::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
        'description',
        'address',
        'url',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->hideFromIndex()
            ,
            Text::make(__('Uuid'), 'uuid')
                ->onlyOnDetail()
            ,
            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
            ,
            Text::make(__('Address'), 'address')
                ->sortable()
                ->help('Postal address.')
            ,
            Textarea::make(__('Description'), 'description')
                ->rows(2)
                ->hideFromIndex()
            ,
            Text::make(__('Url'), 'url')
                ->rules('nullable', 'url')
                ->sortable()
                ->help('<strong>Location website</strong> or <strong>Google Maps Url</strong>.')
            ,
            HasMany::make(__('Events'), 'events', Event::class)
            ,
        ];
    }

    public static function label(): string
    {
        return __('Locations');
    }

    public static function singularLabel(): string
    {
        return __('Location');
    }
}
