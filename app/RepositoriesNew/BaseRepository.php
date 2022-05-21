<?php

namespace App\RepositoriesNew;

use App\Contracts\CriteriaContract;
use App\Contracts\RepositoryContract;
use App\Models\Model;
use Illuminate\Support\Str;

abstract class BaseRepository extends \Prettus\Repository\Eloquent\BaseRepository implements RepositoryContract
{
    public function model(): string
    {
        return Str::of(static::class)
            ->afterLast('\\')
            ->before('Repository')
            ->prepend('\\App\\Models\\')
            ->toString();
    }

    public function getFirstByCriteria(CriteriaContract $criteria): Model
    {
        return $this->getByCriteria($criteria)->first()->value;
    }
}
