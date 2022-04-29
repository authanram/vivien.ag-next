<?php

namespace App\Contracts;

use App\Models\Menu;

interface SiteServiceContract
{
    public static function menu(): Menu|string;
}
