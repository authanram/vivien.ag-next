<?php

namespace App\Services;

use App\Contracts\SiteServiceContract;
use App\Renderers;
use App\Repositories;
use App\Theme;
use App\Url;
use Illuminate\Http\Request;

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

    public function theme(): Theme
    {
        return new Theme();
    }

    public function url(): Url
    {
        return new Url();
    }
}
