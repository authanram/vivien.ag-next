<?php

namespace App\Services;

use App\ClassFinder;
use App\Contracts\Services\NovaFieldServiceContract as Contract;
use Laravel\Nova\Contracts\RelatableField;
use Laravel\Nova\Fields\Field;

final class NovaFieldService implements Contract
{
    public function getFields(): array
    {
        return ClassFinder::resolve(base_path('vendor/laravel/nova/src/Fields'), 'Laravel\\Nova\\Fields\\')
            ->filter(static function ($field) {
                return is_subclass_of($field, Field::class)
                    && is_subclass_of($field, RelatableField::class) === false
                    && in_array($field, config('project-components.fields_ignore'), true) === false;
            })
            ->mapWithKeys(static fn ($field) => [$field => class_basename($field)])
            ->toArray();
    }
}
