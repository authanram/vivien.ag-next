<?php

namespace App\Repositories;

use App\Models\Event as Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class Events extends Repository
{
    protected static function model(): Builder|Model
    {
        return new Model();
    }

    public function upcoming(): self
    {
        $this->builder = self::model()::with(['eventTemplate'])
            ->where('date_to', '>', now())
            ->where('published', true);

        return $this;
    }

    public function queryBuilder(Builder $builder = null): Builder|Collection
    {
        return QueryBuilder::for($builder ?? $this->getBuilder())
            ->allowedFilters([
                AllowedFilter::exact('categories', 'eventTemplate.id'),
            ])
            ->where('date_to', '>', now())
            ->get();
    }

    public function eventTemplates(): \Illuminate\Support\Collection
    {
        return $this->upcoming()->get()->pluck('eventTemplate');
    }
}
