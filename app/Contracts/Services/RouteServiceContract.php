<?php

namespace App\Contracts\Services;

use App\Support\RouteData;
use Illuminate\Support\Collection;

interface RouteServiceContract
{
    /**
     * @return Collection<int, RouteData>
     */
    public function getRoutes(): Collection;
}
