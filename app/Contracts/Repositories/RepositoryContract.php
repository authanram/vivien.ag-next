<?php

namespace App\Contracts\Repositories;

use App\Contracts\CriteriaContract;
use App\Models\Model;
use Prettus\Repository\Contracts\RepositoryInterface;

interface RepositoryContract extends RepositoryInterface
{
    public function model(): string;

    public function getFirstByCriteria(CriteriaContract $criteria): Model;
}
