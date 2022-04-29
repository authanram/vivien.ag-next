<?php

namespace App\Facades;

use App\Contracts\SiteServiceContract;
use Illuminate\Support\Facades\Facade;

final class Site extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return SiteServiceContract::class;
    }
}
