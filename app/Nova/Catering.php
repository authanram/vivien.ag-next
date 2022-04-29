<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class Catering extends Resource
{
    public static string $model = \App\Models\Catering::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'note',
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
            Text::make(__('Note'), 'note')
                ->sortable()
            ,
            HasMany::make(__('Events'), 'events', Event::class)
            ,
        ];
    }

    public static function label(): string
    {
        return __('Caterings');
    }

    public static function singularLabel(): string
    {
        return __('Catering');
    }
}
