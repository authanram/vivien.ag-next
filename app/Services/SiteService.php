<?php

namespace App\Services;

use App\Contracts\SiteServiceContract;
use App\Renderers;
use App\Repositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

final class SiteService implements SiteServiceContract
{
    protected Repositories $repositories;
    protected Renderers $renderers;

    public function __construct(protected Request $request)
    {
        $this->repositories = new Repositories();

        $this->renderers = new Renderers();
    }

    public function content(string $slug): ?string
    {
        return $this->repositories->contents()->findBySlug($slug);
    }

    public function renderers(): Renderers
    {
        return $this->renderers;
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
