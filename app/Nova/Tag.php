<?php

namespace App\Nova;

use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphedByMany;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;

class Tag extends Resource
{
    public static string $model = \App\Models\Tag::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'slug',
    ];

    protected static array $orderBy = [
        'type' => 'asc',
        'name->de' => 'asc',
    ];

    public static $with = [
        'color',
    ];

    public function fields(Request $request): array
    {
        $table = $this->model()?->getTable();

        return [
            ID::make(__('ID'), 'id')
            ,
            Text::make(__('Name'), 'name')
                ->sortable()
            ,
            Slug::make(__('Slug'), 'slug')
                ->from('name')
                ->creationRules("unique:$table,slug")
                ->updateRules("unique:$table,slug,{{resourceId}}")
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
            MorphedByMany::make(__('Attachments'), 'attachments', Attachment::class),
            MorphedByMany::make(__('Events'), 'events', Event::class),
            MorphedByMany::make(__('Images'), 'images', Image::class),
            MorphedByMany::make(__('Posts'), 'posts', Post::class),
        ];
    }
}
