<?php

namespace App\Nova\Components\Types;

use App\ClassFinder;
use Illuminate\Support\Str;

final class Component extends Type
{
    public static function getTypeFieldOptions(): array
    {
        return ClassFinder::resolve(base_path('app/Nova/Components'), 'App\\Nova\\Components')
            ->filter(static fn ($component) => is_subclass_of($component, \App\Nova\Components\Component::class))
            ->mapWithKeys(static fn ($component) => [
                $component => Str::of(class_basename($component))->before('Component')->toString(),
            ])
            ->toArray();
    }
}
