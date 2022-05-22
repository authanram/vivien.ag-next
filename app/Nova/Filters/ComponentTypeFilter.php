<?php

namespace App\Nova\Filters;

use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Filters\BooleanFilter;
use Laravel\Nova\Http\Requests\NovaRequest;

class ComponentTypeFilter extends BooleanFilter
{
    public function name(): string
    {
        return __('Component Type');
    }

    public function apply(NovaRequest $request, $query, $value): Builder
    {
        return $query;
    }

    public function options(NovaRequest $request): array
    {
        return [];
    }
}
