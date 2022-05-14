<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected Route $route;

    public function cacheKey(): string
    {
        return static::class.'@'.$this->route->routable->id;
    }
}
