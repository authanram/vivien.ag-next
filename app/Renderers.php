<?php

namespace App;

use App\Contracts\ContentRendererContract;
use App\Contracts\IconRendererContract;

class Renderers
{
    public static function contentRenderer(): ContentRendererContract
    {
        return resolve(ContentRendererContract::class);
    }

    public static function iconRenderer(): IconRendererContract
    {
        return resolve(IconRendererContract::class);
    }
}
