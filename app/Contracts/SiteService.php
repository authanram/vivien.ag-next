<?php

namespace App\Contracts;

use App\CookieConsent;
use App\ImageCoords;
use App\Parsers;
use App\Renderers;
use App\Repositories;
use App\Text;
use App\Theme;
use App\Url;

interface SiteService
{
    public function cookieConsent(): CookieConsent;

    public function imageCoords(): ImageCoords;

    public function parsers(): Parsers;

    public function renderers(): Renderers;

    public function repositories(): Repositories;

    public function theme(): Theme;

    public function text(): Text;

    public function url(): Url;
}
