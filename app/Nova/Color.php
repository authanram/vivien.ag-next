<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class Color extends Resource
{
    protected static array $orderBy = ['color' => 'asc'];

    public static string $model = \App\Models\Color::class;

    public static $title = 'color';

    public static $search = [
        'id',
        'color'
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->hideFromIndex()
            ,
            Text::make(__('Uuid'), 'uuid')
                ->onlyOnDetail()
            ,
            Text::make(__('Color'), 'color')
                ->rules('required')
                ->creationRules('unique:colors,color')
                ->updateRules('unique:colors,color,{{resourceId}}')
                ->sortable()
                ->help(static::getColorInputHelpText())
            ,
            HasMany::make(__('Event Types'), 'eventTypes', EventTemplate::class)
            ,
            HasMany::make(__('Menu Items'), 'menuItems', MenuItem::class)
            ,
            HasMany::make(__('Tags'), 'tags', Tag::class)
            ,
        ];
    }

    private static function getColorInputHelpText(): string
    {
        return sprintf(
            '%s (Tailwind <a href="%s" class="hover:underline" target="_blank">%s</a>)',
            'E.g. <strong>green</strong>, <strong>blue</strong>, <strong>red</strong>, etc.',
            'https://tailwindcss.com/docs/customizing-colors/#default-color-palette',
            'Color Palette'
        );
    }

    public static function label(): string
    {
        return __('Colors');
    }

    public static function singularLabel(): string
    {
        return __('Color');
    }
}
