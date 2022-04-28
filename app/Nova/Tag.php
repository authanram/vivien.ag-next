<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphedByMany;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;

class Tag extends Resource
{
    protected static array $orderBy = [
        'type' => 'asc',
        'name->de' => 'asc',
    ];

    public static string $model = \App\Models\Tag::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
        'slug',
    ];

    public function fields(Request $request): array
    {
        $fields = [
            ID::make(__('Id'), 'id')
                ->onlyOnDetail()
            ,
            Text::make(__('Name'), 'name')
                ->sortable()
            ,
            Text::make(__('Slug'), 'slug')
                ->sortable()
                ->exceptOnForms()
            ,
            Select::make(__('Type'), 'type')
                ->options([
                    'attachment' => 'attachment',
                    'event' => 'event',
                    'image' => 'image',
                    'post' => 'post',
                ])
                ->required()
                ->sortable()
            ,
            BelongsTo::make(__('Color'), 'color', Color::class)
                ->nullable()
                ->withoutTrashed()
                ->showCreateRelationButton()
            ,
            Number::make(__('Order'), 'order_column')
                ->min(1)
                ->showOnCreating(false)
                ->sortable()
            ,
        ];

        $morphedByMany = [
            'attachment' => MorphedByMany::make(__('Attachments'), 'attachments', Attachment::class),
            'event' => MorphedByMany::make(__('Events'), 'events', Event::class),
            'image' => MorphedByMany::make(__('Images'), 'images', Image::class),
            'post' => MorphedByMany::make(__('Posts'), 'posts', Post::class),
        ];

        $type = $this->model()->getAttribute('type');

        if ($type && $morphedByMany[$type]) {
            $fields[] = $morphedByMany[$type];
        }

        return $fields;
    }
}
