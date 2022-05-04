<?php

namespace App\QueryBuilders;

use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class EventQueryBuilder
{
    public static function build(): Builder|Collection
    {
        return QueryBuilder::for(Event::class)
            ->allowedFilters([
                AllowedFilter::exact('category', 'eventTemplate.name'),
            ])
            ->where('date_to', '>', now())
            ->get();
    }
}
