<?php

namespace App\Services;

use App\Contracts\Services\ComponentServiceContract as Contract;
use App\Models\Model;
use App\Nova\Components\Types\Type;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

final class ComponentService implements Contract
{
    public function getFieldsForNova(NovaRequest $request, Model $resource): array
    {
        return [
            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Select::make(__('Type'), 'type')
                ->options(self::getTypeFieldOptions())
                ->displayUsingLabels()
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Select::make(__('Value'), 'data->value')
                ->displayUsingLabels()
                ->rules('required')
                ->sortable()
                ->hide()
                ->showOnPreview()
                ->dependsOn('type', function (Select $field, NovaRequest $request, FormData $formData) {
                    /** @var Type $type */
                    $type = $formData->get('type');

                    if (is_null($type)) {
                        return;
                    }

                    $field
                        ->options($type::getTypeFieldOptions())
                        ->show();
                }),

            KeyValue::make(__('Meta'), 'data->meta')
                ->dependsOn('data->value', function (KeyValue $field, NovaRequest $request, FormData $formData) {
                    $value = $formData->get('data->value');

                    is_null($value) || is_subclass_of($value, Field::class) === false
                        ? $field->hide()
                        : $field->show();
                }),
        ];
    }

    private static function getTypeFieldOptions(): array
    {
        return collect(config('project-components.types'))
            ->mapWithKeys(static fn($type) => [$type => class_basename($type)])
            ->sort()
            ->toArray();
    }
}
