<?php

namespace App\Contracts;

use App\Menus;
use App\Renderers;
use App\Repositories;

interface SiteServiceContract
{
    public function content(string $slug): ?string;

    public function menus(): Menus;

    public function renderers(): Renderers;

    public function repositories(): Repositories;

    public function url(string $route): mixed;
}
