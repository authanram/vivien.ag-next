<?php

namespace App\Http\Controllers\Api;

use App\EventType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class EventTypesController extends ApiController
{
    final public function fetch(Request $request): Collection
    {
        return static::filter();
    }

    public static function filter(array $filters = ['id']): Collection
    {
        return QueryBuilder::for(EventType::class)

            ->allowedFilters(static::makeExactFilters($filters))

            ->get([
                'id',
                'color_id',
                'name',
                'description',
            ]);
    }
}
