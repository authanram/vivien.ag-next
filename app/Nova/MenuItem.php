<?php

namespace App\Nova;

use App\Models\MenuItem as Model;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class MenuItem extends Resource
{
    use HasFieldOrderColumn;
    use HasSortableRows;

    public static string $model = Model::class;

    public static $title = 'label';

    public static $search = [
        'label',
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

    public static function label(): string
    {
        return __('Menu Items');
    }

    public static function singularLabel(): string
    {
        return __('Menu Item');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable()->showOnPreview(),

            Text::make(__('Label'), 'label')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            BelongsTo::make(__('Menus'), 'menu', Menu::class)
                ->rules('required')
                ->withoutTrashed()
                ->showCreateRelationButton()
                ->sortable(),

            BelongsTo::make(__('Route'), 'route', Route::class)
                ->rules('required')
                ->withoutTrashed()
                ->showCreateRelationButton()
                ->sortable(),

            BelongsTo::make(__('Color'), 'color', Color::class)
                ->rules('required')
                ->withoutTrashed()
                ->showCreateRelationButton()
                ->sortable(),

            $this->orderColumn(),

            Boolean::make(__('Published'), 'published')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

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
