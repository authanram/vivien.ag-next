<?php

namespace App\Contracts\Repositories;

use App\Contracts\CriteriaContract;
use App\Contracts\Support\StaticAttributeSupportContract;

interface StaticAttributeRepositoryContract
{
    public function getFirstByCriteria(CriteriaContract $criteria): StaticAttributeSupportContract;
}
