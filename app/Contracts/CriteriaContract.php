<?php

namespace App\Contracts;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

interface CriteriaContract extends CriteriaInterface
{
    /** @param Eloquent $model */
    public function apply($model, RepositoryContract|RepositoryInterface $repository): Builder|Eloquent;
}
