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

    public static string $model = \App\Models\Content::class;

    public static $title = 'slug';

    public static $search = [
        'slug',
        'title',
        'caption',
        'body',
    ];

    protected static array $orderBy = ['slug' => 'asc'];

    public function fields(Request $request): array
    {
        $table = $this->model()?->getTable();

        return [
            ID::make(__('ID'), 'id')
                ->showOnPreview()
            ,
            Slug::make(__('Slug'), 'slug')
                ->from('title')
                ->creationRules("unique:$table,slug")
                ->updateRules("unique:$table,slug,{{resourceId}}")
                ->required()
                ->sortable()
                ->showOnPreview()
            ,
            Text::make(__('Title'), 'title')
                ->rules('required')
                ->sortable()
                ->showOnPreview()
            ,
            Markdown::make(__('Caption'), 'caption')
                ->default('')
                ->stacked()
                ->alwaysShow()
                ->showOnPreview()
            ,
            Markdown::make(__('Body'), 'body')
                ->default('')
                ->rules('required')
                ->stacked()
                ->alwaysShow()
                ->showOnPreview()
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
