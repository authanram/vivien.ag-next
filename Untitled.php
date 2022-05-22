<?php

use Laravel\Nova\Fields\Field;

App\ClassFinder::resolve(base_path('vendor/laravel/nova/src/Fields'), 'Laravel\Nova\Fields')
    ->filter(fn ($field) => is_subclass_of($field, Field:class))
    ->toArray();