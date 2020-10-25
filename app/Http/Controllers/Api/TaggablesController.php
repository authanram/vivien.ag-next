<?php

namespace App\Http\Controllers\Api;

use App\Models\Taggable;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\QueryBuilder;

class TaggablesController extends ApiController
{
    final public function fetch(Request $request): Collection
    {
        return static::filter();
    }

    public static function filter(array $filters = ['taggable_id', 'taggable_type']): Collection
    {
        return QueryBuilder::for(Taggable::class)

            ->allowedFilters(static::makeExactFilters($filters))

            ->get()

            ->map(fn (Taggable $taggable) => [

                'tag_id' => $taggable->tag_id,

                'taggable_type' => Str::plural(strtolower(Str::afterLast($taggable->taggable_type, '\\'))),

                'taggable_id' => $taggable->taggable_id,

            ]);
    }
}
