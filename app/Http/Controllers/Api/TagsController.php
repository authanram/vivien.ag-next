<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\QueryBuilder;

final class TagsController extends ApiController
{
    public function fetch(): Collection
    {
        return self::filter();
    }

    public static function filter(array $filters = ['id', 'type']): Collection
    {
        return QueryBuilder::for(Tag::class)
            ->allowedFilters(self::makeExactFilters($filters))
            ->get(['id', 'name', 'slug', 'type', 'color_id']);
    }
}
