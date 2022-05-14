<?php

namespace App\Routables;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PageController;
use App\Models\Page as Model;

final class PageRoutable extends Routable
{
    public function __construct(protected Model $entity)
    {
    }

    public function controller(): Controller|string
    {
        return PageController::class;
    }
}
