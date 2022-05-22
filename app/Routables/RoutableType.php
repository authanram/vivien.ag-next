<?php

namespace App\Routables;

use App\Models\Route;
use App\Models\Route as Model;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

final class RoutableType
{
    public static function getFieldsForNova(NovaRequest $request, Route $resource): array
    {
        if ($request->isResourceIndexRequest()) {
            return [];
        }

        return [
            Select::make('Routable', 'routable->type')
                ->options(self::routableOptions($request, $resource))
                ->displayUsingLabels()
                ->rules('required')
                ->sortable()
                ->onlyOnForms()
                ->showOnPreview(),

            Select::make('Value', 'routable->value')
                ->displayUsingLabels()
                ->required()
                ->sortable()
                ->hide()
                ->onlyOnForms()
                ->showOnPreview()
                ->dependsOn('routable->type', function (Select $field, NovaRequest $request, FormData $formData) use ($resource) {
                    /** @var Routable|null $routable */
                    $routable = $formData->get('routable->type');

                    if (is_null($routable)) {
                        $field->hide();

                        return;
                    }

                    $options = $routable::getValueFieldOptions($request, $resource);

                    $field
                        ->options($options)->show()
                        ->withMeta(['name' => $routable::getAttributeName()]);

                    if (count($options) > 1) {
                        return;
                    }

                    $field->required('false')->hide();
                }),
        ];
    }

    private static function routableOptions(NovaRequest $request, Model $resource): array
    {
        return collect(config('project-routables'))
            ->mapWithKeys(static fn ($routable) => [$routable => $routable::getName()])
            ->toArray();
    }
}
