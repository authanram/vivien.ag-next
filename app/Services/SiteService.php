<?php

namespace App\Services;

use App\Contracts\SiteServiceContract;
use App\Menus;
use App\Renderers;
use App\Repositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

final class SiteService implements SiteServiceContract
{
    protected Repositories $repositories;
    protected Menus $menus;
    protected Renderers $renderers;

    public function __construct(protected Request $request)
    {
        $this->repositories = new Repositories();

        $this->menus = new Menus($this->request, $this->repositories->menus());
        $this->renderers = new Renderers();
    }

    public function content(string $slug): ?string
    {
        return $this->repositories->contents()->findBySlug($slug);
    }

    public function menus(): Menus
    {
        return $this->menus;
    }

    public function renderers(): Renderers
    {
        return $this->renderers;
    }

    public function url(string $route, mixed $default = '#'): mixed
    {
        return Route::has($route) ? route($route) : $default;
    }
}
