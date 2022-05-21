<?php

namespace App\Services;

use App\Contracts\Repositories\StaticAttributeRepositoryContract;
use App\Contracts\StaticAttributeServiceContract as Contract;
use App\Contracts\Support\StaticAttributeSupportContract;
use App\RepositoriesNew\Criteria\StaticAttributeBySlugCriteria;

final class StaticAttributeService implements Contract
{
    public function __construct(protected StaticAttributeRepositoryContract $staticAttribute)
    {
    }

    public function getBySlug(string $slug): StaticAttributeSupportContract
    {
        $criteria = new StaticAttributeBySlugCriteria($slug);

        return $this->staticAttribute->getFirstByCriteria($criteria)->getAttribute('value');
    }
}
