<?php

namespace App\Services;

use App\Contracts\SiteServiceContract;
use App\Menus;
use App\Repositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

final class SiteService implements SiteServiceContract
{
    protected Repositories $repositories;

    public function __construct(protected Request $request)
    {
        $this->repositories = new Repositories();
    }

    public function menus(): Menus
    {
        return new Menus($this->request, $this->repositories->menus());
    }

    public function repositories(): Repositories
    {
        return $this->repositories;
    }

    public function url(string $route, mixed $default = '#'): mixed
    {
        return Route::has($route) ? route($route) : $default;
    }
}
