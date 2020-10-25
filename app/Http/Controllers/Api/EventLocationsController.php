<?php

namespace App\Http\Controllers\Api;

use App\Models\EventLocation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class EventLocationsController extends ApiController
{
    final public function fetch(Request $request): Collection
    {
        return static::filter();
    }

    public static function filter(array $filters = ['id']): Collection
    {
        return QueryBuilder::for(EventLocation::class)

            ->allowedFilters(static::makeExactFilters($filters))

            ->get([
                'id',
                'name',
                'description',
                'address',
                'url',
            ]);
    }
}
