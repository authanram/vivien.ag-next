<?php

namespace App\Contracts\Services;

use App\Support\RouteDataData;
use Illuminate\Support\Collection;

interface RouteServiceContract
{
    /**
     * @return Collection<int, RouteDataData>
     */
    public function getRoutes(): Collection;
}
