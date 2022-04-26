<?php

namespace App\Http\Controllers\Api;

use App\Models\Taggable;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\QueryBuilder;

final class TaggablesController extends ApiController
{
    public function fetch(): Collection
    {
        return self::filter();
    }

    public static function filter(array $filters = ['taggable_id', 'taggable_type']): Collection
    {
        return QueryBuilder::for(Taggable::class)
            ->allowedFilters(self::makeExactFilters($filters))
            ->get()
            ->map(fn (Taggable $taggable) => [
                'tag_id' => $taggable->tag_id,
                'taggable_type' => Str::plural(strtolower(Str::afterLast($taggable->taggable_type, '\\'))),
                'taggable_id' => $taggable->taggable_id,
            ]);
    }
}
