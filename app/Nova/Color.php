<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class Color extends Resource
{
    protected static array $orderBy = ['color' => 'asc'];

    public static $group = 'System';

    public static string $model = \App\Models\Color::class;

    public static $title = 'color';

    public static $search = [
        'id',
        'color'
    ];

    final public function fields(Request $request): array
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
            HasMany::make(__('Event Types'), 'eventTypes', EventType::class)
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

    final public static function label(): string
    {
        return __('Colors');
    }

    final public static function singularLabel(): string
    {
        return __('Color');
    }
}
