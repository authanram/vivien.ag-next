<?php

namespace App\Nova;

use Laravel\Nova\Fields\Line;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class EventTemplate extends Resource
{
    public static string $model = \App\Models\EventTemplate::class;

    public static $title = 'name';

    public static $with = ['color', 'events'];

    public static $search = [
        'name',
        'description',
    ];

    protected static array $orderBy = ['name' => 'asc'];

    public function fields(Request $request): array
    {
        return [
            ID::make()
            ,
            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
            ,
            Textarea::make(__('Description'), 'description')
                ->rows(2)
                ->hideFromIndex()
            ,
            BelongsTo::make(__('Color'), 'color', Color::class)
            ,
            HasMany::make(__('Events'), 'events', Event::class)
            ,
            Line::make(__('Events'), fn () => $this->resource->events->count()),
        ];
    }

    public static function label(): string
    {
        return __('Event Templates');
    }

    public static function singularLabel(): string
    {
        return __('Event Template');
    }
}
