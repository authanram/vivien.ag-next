<?php

namespace App\RepositoriesNew\Criteria;

use App\Contracts\CriteriaContract;
use Prettus\Repository\Contracts\RepositoryInterface;

class StaticAttributeBySlugCriteria implements CriteriaContract
{
    public function __construct(protected string $slug)
    {
    }

    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('data->slug', $this->slug);
    }
}
