<?php

namespace App\Nova;

use App\Models\EventTemplate as Model;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class EventTemplate extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    protected static array $orderBy = ['name' => 'asc'];

    public static $search = [
        'name',
        'description',
    ];

    public static $with = [
        'color:id,color',
        'events:event_template_id',
    ];

    public static function label(): string
    {
        return __('Event Templates');
    }

    public static function singularLabel(): string
    {
        return __('Event Template');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->creationRules('required', 'unique:event_templates,name')
                ->updateRules('required', 'unique:event_templates,name,{{resourceId}}')
                ->sortable()
                ->showOnPreview(),

            Textarea::make(__('Description'), 'description')
                ->rows(2)
                ->hideFromIndex()
                ->showOnPreview(),

            BelongsTo::make(__('Color'), 'color', Color::class)
                ->withoutTrashed()
                ->showOnPreview(),

            HasMany::make(__('Events'), 'events', Event::class),

            Line::make(__('Events'), fn () => $this->resource->events->count())
                ->extraClasses('text-sm'),
        ];
    }
}
