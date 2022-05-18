<?php

namespace App\Nova;

use Laravel\Nova\Fields\Color as ColorField;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest as Request;

class Color extends Resource
{
    public static string $model = \App\Models\Color::class;

    public static $title = 'color';

    public static $search = [
        'color'
    ];

    protected static array $orderBy = ['color' => 'asc'];

    public static function label(): string
    {
        return __('Colors');
    }

    public static function singularLabel(): string
    {
        return __('Color');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Color'), 'color')
                ->creationRules('required', 'unique:colors,color')
                ->updateRules('required', 'unique:colors,color,{{resourceId}}')
                ->help(static::getColorInputHelpText())
                ->sortable()
                ->showOnPreview(),

            ColorField::make('RGB', 'rgb')
                ->rules('required', 'string')
                ->showOnPreview(),

            HasMany::make(__('Event Templates'), 'eventTemplates', EventTemplate::class),

            HasMany::make(__('Menu Items'), 'menuItems', MenuItem::class),

            HasMany::make(__('Tags'), 'tags', Tag::class),
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
}
