<?php

namespace App\Services;

use App\Contracts\SiteServiceContract;
use App\Models\Menu;

final class SiteService implements SiteServiceContract
{
    public static function menu(): Menu|string
    {
        return Menu::class;
    }
}
