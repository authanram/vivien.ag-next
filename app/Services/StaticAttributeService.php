<?php

namespace App\Services;

use App\Contracts\Repositories\StaticAttributeRepositoryContract;
use App\Contracts\StaticAttributeServiceContract as Contract;
use App\RepositoriesNew\Criteria\StaticAttributeBySlugCriteria;

final class StaticAttributeService implements Contract
{
    public function __construct(protected StaticAttributeRepositoryContract $staticAttribute)
    {
    }

    public function slogan(): string
    {
        return $this->getFirstByCriteria('slogan');
    }

    /** @noinspection PhpSameParameterValueInspection */
    private function getFirstByCriteria(string $slug): string
    {
        $criteria = new StaticAttributeBySlugCriteria($slug);

        return $this->staticAttribute->getFirstByCriteria($criteria)->value();
    }
}
