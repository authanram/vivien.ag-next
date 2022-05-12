<?php

namespace App\Services;

use App\Configuration;
use App\Contracts\SiteServiceContract;
use App\CookieConsent;
use App\ImageCoords;
use App\Parsers;
use App\Renderers;
use App\Repositories;
use App\Text;
use App\Theme;
use App\Url;
use Illuminate\Http\Request;

final class SiteService implements SiteServiceContract
{
    protected Configuration $configuration;
    protected CookieConsent $cookieConsent;
    protected ImageCoords $imageCoords;
    protected Parsers $parsers;
    protected Renderers $renderers;
    protected Repositories $repositories;
    protected Text $text;
    protected Theme $theme;
    protected Url $url;

    public function __construct(protected Request $request)
    {
    }

    public function configuration(): Configuration
    {
        $this->configuration ??= new Configuration();

        return $this->configuration;
    }

    public function cookieConsent(): CookieConsent
    {
        $this->cookieConsent ??= new CookieConsent();

        return $this->cookieConsent;
    }

    public function imageCoords(): ImageCoords
    {
        $this->imageCoords ??= new ImageCoords($this->repositories->imageCoords());

        return $this->imageCoords;
    }

    public function parsers(): Parsers
    {
        $this->parsers ??= new Parsers();

        return $this->parsers;
    }

    public function renderers(): Renderers
    {
        $this->renderers ??= new Renderers();

        return $this->renderers;
    }

    public function repositories(): Repositories
    {
        $this->repositories ??= new Repositories();

        return $this->repositories;
    }

    public function theme(): Theme
    {
        $this->theme ??= new Theme($this->repositories());

        return $this->theme;
    }

    public function text(): Text
    {
        $this->text ??= new Text();

        return new Text();
    }

    public function url(): Url
    {
        $this->url ??= new Url();

        return new Url();
    }
}
