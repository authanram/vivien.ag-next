<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class TagsController extends ApiController
{
    final public function fetch(Request $request): Collection
    {
        return static::filter();
    }

    public static function filter(array $filters = ['id', 'type']): Collection
    {
        return QueryBuilder::for(Tag::class)

            ->allowedFilters(static::makeExactFilters($filters))

            ->get([
                'id',
                'name',
                'slug',
                'type',
                'color_id',
            ]);
    }
}
