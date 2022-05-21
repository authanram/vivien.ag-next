<?php

namespace App\Contracts\Services;

use App\Support\Route;
use Illuminate\Support\Collection;

interface RouteServiceContract
{
    /**
     * @return Collection<int, Route>
     */
    public function getRoutes(): Collection;
}
