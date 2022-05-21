<?php

namespace App\Routables;

use App\Contracts\Support\RoutableContract;
use App\Http\Controllers\PageController as Controller;
use App\Models\Page as Model;

final class PageRoutable extends Routable
{
    public static function controller(): Controller|string
    {
        return Controller::class;
    }

    public static function model(): Model|string|null
    {
        return Model::class;
    }
}
