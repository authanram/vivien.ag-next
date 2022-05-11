<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class MenuItem extends Resource
{
    public static string $model = \App\Models\MenuItem::class;

    public static $title = 'label';

    public static $search = [
        'label',
    ];

    public static array $searchRelations = [
        'menu' => ['slug'],
        'route' => ['route'],
        'color' => ['color'],
    ];

    protected static array $orderBy = [
        'menu_id' => 'asc',
        'order_column' => 'asc',
    ];

    public static $with = [
        'color',
        'menu',
        'route',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make(__('ID'), 'id')
                ->showOnPreview()
            ,
            Text::make(__('Label'), 'label')
                ->rules('required')
                ->sortable()
                ->showOnPreview()
            ,
            BelongsTo::make(__('Menus'), 'menu', Menu::class)
                ->rules('required')
                ->withoutTrashed()
                ->showCreateRelationButton()
                ->sortable()
            ,
            BelongsTo::make(__('Route'), 'route', Route::class)
                ->rules('required')
                ->withoutTrashed()
                ->showCreateRelationButton()
                ->sortable()
            ,
            BelongsTo::make(__('Color'), 'color', Color::class)
                ->rules('required')
                ->withoutTrashed()
                ->showCreateRelationButton()
                ->sortable()
            ,
            Boolean::make(__('Published'), 'published')
                ->rules('required')
                ->sortable()
                ->showOnPreview()
            ,
        ];
    }

    private static function getVisibility(): array
    {
        return [
            null => '--',
            'xs' => '>= 340px (xs)',
            'sm' => '>= 640px (sm)',
            'md' => '>= 768px (md)',
            'lg' => '>= 1024px (lg)',
            'xl' => '>= 1280px (xl)',
        ];
    }

    public static function label(): string
    {
        return __('Menu Items');
    }

    public static function singularLabel(): string
    {
        return __('Menu Item');
    }
}
