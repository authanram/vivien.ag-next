<?php

namespace App\Repositories;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class Repository
{
    protected static Model|string $model;
    protected Collection $collections;
    protected Builder $builder;

    public static function builder(): Builder
    {
        return self::model()::query();
    }

    public static function model(): Eloquent|string
    {
        return static::$model;
    }

    public function __construct()
    {
        $this->collections = collect();

        $this->builder = static::builder();
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
