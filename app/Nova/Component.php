<?php

namespace App\Nova;

use App\Contracts\Services\ComponentServiceContract;
use App\Models\Component as Model;
use App\Nova\Filters\ComponentTypeFilter;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest as Request;

class Component extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $search = [
        'type',
        'name',
        'data',
    ];

    public static $with = ['children'];

    public static function label(): string
    {
        return __('Components');
    }

    public static function singularLabel(): string
    {
        return __('Component');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()
                ->sortable()
                ->showOnPreview(),

            ...resolve(ComponentServiceContract::class)
                ->getFieldsForNova($request, $this->resource),

            BelongsToMany::make(__('Children'), 'children', static::class),
        ];
    }

    public function filters(Request $request): array
    {
        return [
            new ComponentTypeFilter(),
        ];
    }
}
