<?php

namespace App\Contracts;

use App\Menus;
use App\Repositories;

interface SiteServiceContract
{
    public function menus(): Menus;

    public function repositories(): Repositories;
}
