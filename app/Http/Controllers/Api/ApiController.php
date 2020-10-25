<?php

namespace App\Http\Controllers\Api;

use App\Contracts\DataServiceContract;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\AllowedFilter;

class ApiController extends Controller
{
    protected DataServiceContract $dataService;

    /** @noinspection MagicMethodsValidityInspection */
    public function __construct(DataServiceContract $dataService)
    {
        $this->dataService = $dataService;
    }

    protected static function makeExactFilters(array $filters, array $ignored = []): array
    {
        $exactFilters = [];

        foreach ($filters as $filter) {

            if (! \in_array($filter, $ignored, true)) {

                $exactFilters[] = AllowedFilter::exact($filter);

            }

        }

        return $exactFilters;
    }
}
