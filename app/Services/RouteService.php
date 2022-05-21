<?php

namespace App\Services;

use App\Contracts\Repositories\RouteRepositoryContract;
use App\Contracts\Services\RouteServiceContract as Contract;
use App\RepositoriesNew\Criteria\IsPublishedCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

final class RouteService implements Contract
{
    public function __construct(protected Request $request, protected RouteRepositoryContract $routeRepository)
    {
    }

    public function getRoutes(): Collection
    {
        return $this->routeRepository->getByCriteria(new IsPublishedCriteria());
    }
}
