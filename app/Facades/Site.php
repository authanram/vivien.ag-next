<?php

namespace App\Facades;

use App\Contracts\SiteService;
use Illuminate\Support\Facades\Facade;

final class Site extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return SiteService::class;
    }
}
