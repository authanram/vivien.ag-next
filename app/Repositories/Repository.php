<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class Repository
{
    protected Builder|Model $builder;

    abstract protected static function model(): Builder|Model;

    public function __construct()
    {
        $this->builder = static::model();
    }

    public function getBuilder(): Builder|Model
    {
        return $this->builder;
    }

    public function setBuilder(Builder $builder = null): self
    {
        $this->builder = $builder;

        return $this;
    }

    protected function with(array $with): static
    {
        $this->getBuilder()->with($with);

        return $this;
    }

    protected function get(array $columns = ['*']): Collection
    {
        return $this->builder->get($columns);
    }
}
