<?php

namespace App\Contracts;

use App\Renderers;
use App\Repositories;
use App\Theme;
use App\Url;

interface SiteServiceContract
{
    public function content(string $slug): ?string;

    public function renderers(): Renderers;

    public function repositories(): Repositories;

    public function theme(): Theme;

    public function url(): Url;
}
