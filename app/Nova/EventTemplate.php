<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class EventTemplate extends Resource
{
    protected static array $orderBy = ['name' => 'asc'];

    public static string $model = \App\Models\EventTemplate::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
        'description',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()
                ->hideFromIndex()
            ,
            Text::make(__('Uuid'), 'uuid')
                ->onlyOnDetail()
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
        ];
    }

    public static function label(): string
    {
        return __('Templates');
    }

    public static function singularLabel(): string
    {
        return __('Template');
    }
}
