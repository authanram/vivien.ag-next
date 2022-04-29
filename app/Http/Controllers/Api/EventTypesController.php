<?php

namespace App\Http\Controllers\Api;

use App\Models\EventTemplate;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\QueryBuilder;

final class EventTypesController extends ApiController
{
    public function fetch(): Collection
    {
        return self::filter();
    }

    public static function filter(array $filters = ['id']): Collection
    {
        return QueryBuilder::for(EventTemplate::class)
            ->allowedFilters(self::makeExactFilters($filters))
            ->get(['id', 'color_id', 'name', 'description']);
    }
}
