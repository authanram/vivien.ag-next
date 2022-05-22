<?php

namespace App\Nova\Components;

use App\Models\Model;
use Laravel\Nova\Http\Requests\NovaRequest;

abstract class Component
{
    abstract public function name(): string;

    public function internalFields(NovaRequest $request, Model $resource): array
    {
        return [];
    }

    abstract public function fields(NovaRequest $request, Model $resource): array;

    abstract public function component(): \Illuminate\View\Component|string;
}
