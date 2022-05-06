<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\QueryBuilder;

final class Events extends Repository
{
    protected static Model|string $model = Event::class;

    public function upcoming(): self
    {
        $this->builder = self::model()::with(['eventTemplate'])
            ->where('date_to', '>', now())
            ->where('published', true);

        /** @noinspection StaticInvocationViaThisInspection */
        $this->collections->put(__FUNCTION__, $this->builder->get());

        return $this;
    }

    public function upcomingEventTemplates(): \Illuminate\Support\Collection
    {
        return $this->collections->get('upcoming')->pluck('eventTemplate');
    }

    public function upcomingTags(): \Illuminate\Support\Collection
    {
        return $this->collections->get('upcoming')
            ->load('tags')->pluck('tags')
            ->flatten()
            ->unique('id')
            ->values();
    }

    public function queryBuilder(array $filters): Builder|Collection
    {
        return QueryBuilder::for($this->getBuilder())
            ->allowedFilters($filters)
            ->where('date_to', '>', now())
            ->get();
    }
}
