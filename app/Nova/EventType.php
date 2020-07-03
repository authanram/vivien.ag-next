<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class EventType extends Resource
{
    protected static array $orderBy = ['name' => 'asc'];

    public static $group = 'Events';

    public static $model = \App\EventType::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
        'description',
    ];

    final public function fields(Request $request): array
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
            BelongsTo::make(__('Color'), 'color')
            ,
            HasMany::make(__('Events'), 'events')
            ,
        ];
    }

    final public static function label(): string
    {
        return 'Types';
    }
}
