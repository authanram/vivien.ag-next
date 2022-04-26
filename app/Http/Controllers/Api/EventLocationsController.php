<?php

namespace App\Http\Controllers\Api;

use App\Models\EventLocation;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\QueryBuilder;

final class EventLocationsController extends ApiController
{
    public function fetch(): Collection
    {
        return self::filter();
    }

    public static function filter(array $filters = ['id']): Collection
    {
        return QueryBuilder::for(EventLocation::class)
            ->allowedFilters(self::makeExactFilters($filters))
            ->get(['id', 'name', 'description', 'address', 'url']);
    }
}
