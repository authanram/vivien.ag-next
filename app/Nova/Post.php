<?php

namespace App\Nova;

use App\Models\Post as Model;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime;
use Spatie\TagsField\Tags;

class Post extends Resource
{
    public static string $model = Model::class;

    public static $title = 'title';

    public static $search = [
        'title',
        'slug',
        'body',
    ];

    protected static array $orderBy = ['created_at' => 'desc'];

    public static $with = ['tags'];

    public static function label(): string
    {
        return __('Posts');
    }

    public static function singularLabel(): string
    {
        return __('Post');
    }

    public function fields(Request $request): array
    {
        $table = $this->model()?->getTable();

        return [
            ID::make()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Title'), 'title')
                ->rules('required', 'min:3')
                ->sortable()
                ->showOnPreview(),

            Slug::make(__('Slug'), 'slug')
                ->from('title')
                ->creationRules('required', "unique:$table,slug")
                ->updateRules('required', "unique:$table,slug,{{resourceId}}")
                ->sortable()
                ->showOnPreview(),

            Markdown::make(__('Body'), 'body')
                ->rules('required')
                ->showOnPreview(),

            DateTime::make(__('Published At'), 'published_at')
                ->onlyOnForms(),

            Text::make(__('Published At'), 'published_at', static function ($value) {
                return $value->format('d.m.Y, H:i');
            })->rules('required')
                ->exceptOnForms()
                ->sortable()
                ->showOnPreview(),

            Tags::make('Tags')
                ->type('post')
                ->showOnPreview(),
        ];
    }
}
