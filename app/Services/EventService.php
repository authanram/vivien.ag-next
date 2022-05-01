<?php

namespace App\Services;

use App\Contracts\EventServiceContract;
use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class EventService implements EventServiceContract
{
    protected ?Builder $builder = null;

    public function builder(): Builder
    {
        $this->builder ??= Event::published();

        return $this->builder;
    }

    public function get(array $columns = ['*']): Collection
    {
        return $this->builder()->get($columns);
    }

    public function with(array $with): self
    {
        $this->builder()->with($with);

        return $this;
    }

    public function dateRange(string $from, string $to): self
    {
        /** @noinspection PhpUndefinedMethodInspection */
        $this->builder()::startsAfter($from)->startsBefore($to);

        return $this;
    }

    public function limit(int $limit): self
    {
        $this->builder()::limit($limit);

        return $this;
    }

    public function tags(array $tags = null): self
    {
        if ($tags) {
            /** @noinspection PhpUndefinedMethodInspection */
            $this->builder()::withAnyTags($tags, 'event');
        } else {
            $this->builder()->with('tags');
        }

        return $this;
    }

    public function upcoming(): self
    {
        //$this->builder()::upcoming();

        return $this;
    }

    public function hasUpcomingEvents(): bool
    {
        return $this->upcoming()->get()->count();
    }
}

//$service = resolve(\App\Contracts\EventServiceContract::class);
//
//$service
//
//    ->dateRange('2020-05-29 00:00:00', '2020-05-30 00:00:00')
//
//    ->tags(['schreibreise1', 'Test'])
//
//    ->get();
//
//
