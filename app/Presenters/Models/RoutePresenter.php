<?php

namespace App\Presenters\Models;

use App\Models\Route;
use App\Presenters\Presenter;
use App\RouteActionResolver;

/**
 * @property Route $entity
 */
class RoutePresenter extends Presenter
{
    public function resolveAction(): RouteActionResolver
    {
        return RouteActionResolver::make($this->entity->action);
    }
}
