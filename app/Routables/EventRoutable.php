<?php

namespace App\Routables;

use App\Http\Controllers\EventController as Controller;
use App\Models\Event as Model;

final class EventRoutable extends Routable
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
