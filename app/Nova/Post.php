<?php

namespace App\Nova;

use Drobee\NovaSluggable\Slug;
use Drobee\NovaSluggable\SluggableText;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Spatie\TagsField\Tags;

class Post extends Resource
{
    protected static array $orderBy = ['created_at' => 'desc'];

    public static $model = \App\Post::class;

    public static $title = 'id';

    public static $search = [
        'id',
        'body',
    ];

    final public function fields(Request $request): array
    {
        return [
            ID::make(__('Id'), 'id')
                ->onlyOnDetail()
            ,
            Text::make(__('Uuid'), 'uuid')
                ->onlyOnDetail()
            ,
            SluggableText::make(__('Title'), 'title')
                ->rules('required', 'min:3')
                ->sortable()
            ,
            Slug::make(__('Slug'), 'slug')
                ->withMeta(['readonly' => 'true'])
                ->rules('required')
                ->sortable()
            ,
            Textarea::make(__('Body'), 'body')
                ->rules('required')
            ,
            DateTime::make(__('Published At'), 'published_at', static function ($value) {
                return $value ?? \Carbon\Carbon::now()->format('Y-m-d H:i:s');
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
}
