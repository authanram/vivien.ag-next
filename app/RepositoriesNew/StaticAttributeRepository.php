<?php

namespace App\RepositoriesNew;

use App\Contracts\CriteriaContract;
use App\Contracts\Repositories\StaticAttributeRepositoryContract;
use App\Contracts\Support\StaticAttributeSupportContract;

final class StaticAttributeRepository extends BaseRepository implements StaticAttributeRepositoryContract
{
    public function getFirstByCriteria(CriteriaContract $criteria): StaticAttributeSupportContract
    {
        return $this->getByCriteria($criteria)->first()->value;
    }
}
