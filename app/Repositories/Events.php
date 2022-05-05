<?php

namespace App\Repositories;

use App\Models\Event as Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class Events extends Repository
{
    public function upcoming(): Builder
    {
        return self::model()::with(['eventTemplate'])
            ->where('date_to', '>', now())
            ->where('published', true);
    }

    public function queryBuilder(): Builder|Collection
    {
        return QueryBuilder::for($this->upcoming())
            ->allowedFilters([
                AllowedFilter::exact('categories', 'eventTemplate.id'),
            ])
            ->where('date_to', '>', now())
            ->get();
    }

    protected static function model(): Builder|string
    {
        return Model::class;
    }
}
