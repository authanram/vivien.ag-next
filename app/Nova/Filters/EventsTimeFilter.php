<?php

namespace App\Nova\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class EventsTimeFilter extends Filter
{
    public function name(): string
    {
        return __('Time Region');
    }

    public function apply(Request $request, $query, $value): Builder
    {
        if ($value === 'upcoming') {
            return $query->where('date_to', '>', now());
        }

        if ($value === 'past') {
            return $query->where('date_to', '<', now());
        }

        return $query;
    }

    final public function options(Request $request): array
    {
        return [
            __('Upcoming') => 'upcoming',
            __('Past') => 'past',
            __('All') => 'all',
        ];
    }

    final public function default(): string
    {
        return 'upcoming';
    }
}
