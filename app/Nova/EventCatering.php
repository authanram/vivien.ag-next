<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class EventCatering extends Resource
{
    protected static array $orderBy = ['name' => 'asc'];

    public static string $model = \App\Models\EventCatering::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
    ];

    public static function group(): string
    {
        return __('Events');
    }

    final public function fields(Request $request): array
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
            HasMany::make(__('Events'), 'events', Event::class)
            ,
        ];
    }

    final public static function label(): string
    {
        return __('Caterings');
    }

    final public static function singularLabel(): string
    {
        return __('Catering');
    }
}
