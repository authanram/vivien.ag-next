<?php

namespace App\Contracts\Repositories;

use App\Contracts\CriteriaContract;
use App\Models\Model;

interface RepositoryContract
{
    public function model(): string;

    public function getFirstByCriteria(CriteriaContract $criteria): Model;
}
