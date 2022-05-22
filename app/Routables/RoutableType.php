<?php

namespace App\Routables;

use App\Models\Route;
use App\Models\Route as Model;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

final class RoutableType
{
    public static function getFieldsForNova(NovaRequest $request, Route $resource): array
    {
        return [
            Select::make('Routable', 'routable')
                ->options(self::routableOptions($request, $resource))
                ->displayUsingLabels()
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Select::make('Value', 'value')
                ->options([])
                ->displayUsingLabels()
                ->rules('required')
                ->sortable()
                ->showOnPreview(),
        ];
    }

    private static function routableOptions(NovaRequest $request, Model $resource): array
    {
        return collect(config('project-routables'))
            ->mapWithKeys(static fn ($routable) => [$routable => $routable::getName()])
            ->toArray();
    }
}
