<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;

class MenuItem extends Resource
{
    use HasSortableRows;

    protected static array $orderBy = [
        'menu_id' => 'asc',
        'sort_order' => 'asc',
    ];

    public static $group = 'Routing';

    public static $model = \App\Models\MenuItem::class;

    public static $title = 'label';

    public static $search = [
        'id',
        'label',
    ];

    public static $searchRelations = [
        'menu' => ['slug'],
        'route' => ['route'],
        'color' => ['color'],
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
            Text::make(__('Label'), 'label')
                ->rules('required')
                ->sortable()
            ,
            BelongsTo::make(__('Menu'), 'Menu')
                ->required()
                ->withoutTrashed()
                ->showCreateRelationButton()
                ->sortable()
            ,
            BelongsTo::make(__('Route'), 'route')
                ->required()
                ->withoutTrashed()
                ->showCreateRelationButton()
                ->sortable()
            ,
            BelongsTo::make(__('Color'), 'color')
                ->required()
                ->withoutTrashed()
                ->showCreateRelationButton()
                ->sortable()
            ,
            Select::make(__('Breakpoint'), 'dropdown_breakpoint')
                ->options(static::getVisibility())
                ->rules('nullable', 'in:' . implode(',', array_keys(static::getVisibility())))
                ->help('Item will only be visible at the horizontal menu, if the selected or any larger breakpoint has been hit.')
                ->displayUsingLabels()
                ->sortable()
            ,
            Boolean::make(__('Published'), 'published')
                ->rules('required')
                ->sortable()
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
}
