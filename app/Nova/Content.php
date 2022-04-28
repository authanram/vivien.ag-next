<?php

namespace App\Nova;

use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;
//use OptimistDigital\NovaSortable\Traits\HasSortableManyToManyRows;

class Content extends Resource
{
    //use HasSortableManyToManyRows;

    protected static array $orderBy = ['slug' => 'asc'];

    public static string $model = \App\Models\Content::class;

    public static $title = 'slug';

    public static $search = [
        'id',
        'slug',
        'caption',
        'body',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make(__('Id'), 'id')
                ->onlyOnDetail()
            ,
            Text::make(__('Uuid'), 'uuid')
                ->onlyOnDetail()
            ,
            Slug::make(__('Slug'), 'slug')
                ->rules('required')
                ->sortable()
            ,
            Markdown::make(__('Caption'), 'caption')
                ->default('')
                ->stacked()
                ->alwaysShow()
            ,
            Markdown::make(__('Body'), 'body')
                ->default('')
                ->rules('required')
                ->stacked()
                ->alwaysShow()
            ,
            BelongsToMany::make(__('Routes'), 'routes', Route::class)
            ,
        ];
    }

    public static function label(): string
    {
        return __('Page Contents');
    }

    public static function singularLabel(): string
    {
        return __('Page Content');
    }
}
