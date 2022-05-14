<?php

namespace App\Presenters;

use App\Models\Route;

/**
 * @property Route $entity
 */
class RoutePresenter extends Presenter
{
    public function getController(): string
    {
        dd($this->entity);

        return '';
    }
}
