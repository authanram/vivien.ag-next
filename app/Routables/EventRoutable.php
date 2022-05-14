<?php

namespace App\Routables;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EventsController;
use App\Models\Event as Model;

final class EventRoutable extends Routable
{
    public function __construct(protected Model $entity)
    {
    }

    public function controller(): Controller|string
    {
        return EventsController::class;
    }
}
