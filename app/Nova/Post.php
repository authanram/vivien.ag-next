<?php

namespace App\Nova;

use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Spatie\TagsField\Tags;

class Post extends Resource
{
    public static string $model = \App\Models\Post::class;

    public static $search = [
        'body',
    ];

    protected static array $orderBy = ['created_at' => 'desc'];

    public function fields(Request $request): array
    {
        $table = $this->model()?->getTable();

        return [
            ID::make(__('ID'), 'id')
                ->hideFromIndex()
            ,
            Text::make(__('Title'), 'title')
                ->rules('required', 'min:3')
                ->sortable()
            ,
            Slug::make(__('Slug'), 'slug')
                ->from('title')
                ->creationRules("unique:$table,slug")
                ->updateRules("unique:$table,slug,{{resourceId}}")
                ->required()
                ->sortable()
            ,
            Textarea::make(__('Body'), 'body')
                ->rules('required')
            ,
            DateTime::make(__('Published At'), 'published_at', static function ($value) {
                return $value ?? now()->format('Y-m-d H:i:s');
            })
                ->rules('required')
                ->sortable()
            ,
            Tags::make('Tags')
                ->type('post')
                ->withLinkToTagResource()
            ,
        ];
    }

    public static function label(): string
    {
        return __('Posts');
    }

    public static function singularLabel(): string
    {
        return __('Post');
    }
}
