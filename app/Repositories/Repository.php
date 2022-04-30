<?php

namespace App\Repositories;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

abstract class Repository
{
    private Builder $builder;

    abstract protected static function model(): Builder|string;

    protected function builder(): Builder
    {
        $this->builder ??= is_object(static::model()) ? static::model() : new (static::model());

        return $this->builder;
    }

    protected function with(array $with): static
    {
        $this->builder()->with($with);

        return $this;
    }

    protected function get(array $columns = ['*']): Collection
    {
        return $this->builder->get($columns);
    }
}
