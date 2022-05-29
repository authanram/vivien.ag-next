<?php

namespace App\Nova;

use App\Models\Location as Model;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Location extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'address',
        'description',
        'url',
    ];

    protected static array $orderBy = [
        'name' => 'asc',
    ];

    public static $with = [
        'events:location_id',
    ];

    public static function label(): string
    {
        return __('Event Locations');
    }

    public static function singularLabel(): string
    {
        return __('Event Location');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Address'), 'address')
                ->help('Postal address.')
                ->sortable()
                ->showOnPreview(),

            Textarea::make(__('Description'), 'description')
                ->rows(2)
                ->hideFromIndex()
                ->showOnPreview(),

            URL::make(__('URL'), 'url')
                ->displayUsing(fn ($value) => $value)
                ->help('<strong>Location website</strong> or <strong>Google Maps Url</strong>.')
                ->textAlign('left')
                ->sortable()
                ->showOnPreview(),

            Line::make(__('Events'), fn () => $this->resource->events->count())
                ->extraClasses('text-sm'),

            HasMany::make(__('Events'), 'events', Event::class),
        ];
    }
}
