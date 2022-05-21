<?php

namespace App\RepositoriesNew\Criteria;

use App\Contracts\CriteriaContract;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Contracts\RepositoryInterface;

class IsPublishedCriteria implements CriteriaContract
{
    public function __construct(protected bool $isPublished = true)
    {
    }

    public function apply($model, RepositoryInterface $repository): Builder
    {
        return $model->where('published', $this->isPublished);
    }
}
