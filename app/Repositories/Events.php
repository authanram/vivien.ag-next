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

        $this->collections->put(__FUNCTION__, $this->builder->get());

        return $this;
    }

    public function upcomingEventTemplates(): \Illuminate\Support\Collection
    {
        return $this->collections->get('upcoming')->pluck('eventTemplate');
    }

    public function upcomingTags(): \Illuminate\Support\Collection
    {
        return $this->collections->get('upcoming')->load('tags')->pluck('tags');
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
}
