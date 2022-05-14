<?php

namespace App\Routables;

use App\Http\Controllers\Controller;
use App\Models\Controller as Model;

final class ControllerRoutable extends Routable
{
    public function __construct(protected Model $entity)
    {
    }

    public function controller(): Controller|string
    {
        return $this->entity->getAttributes()['name'];
    }
}
