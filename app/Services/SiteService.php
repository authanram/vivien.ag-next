<?php

namespace App\Services;

use App\Contracts\SiteServiceContract;
use App\CookieConsent;
use App\ImageCoords;
use App\Renderers;
use App\Repositories;
use App\Text;
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

    public function cookieConsent(): CookieConsent
    {
        return new CookieConsent();
    }

    public function content(string $slug): ?string
    {
        return $this->repositories->contents()->findBySlug($slug);
    }

    public function imageCoords(): ImageCoords
    {
        return new ImageCoords($this->repositories->imageCoords());
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
        return new Theme($this->repositories);
    }

    public function text(): Text
    {
        return new Text();
    }

    public function url(): Url
    {
        return new Url();
    }
}
