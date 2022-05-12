<?php

namespace App\Presenters\Models;

use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Presenters\Presenter;

/**
 * @property Route $entity
 */
class RoutePresenter extends Presenter
{
    public function actionResolver(): Controller|string|null
    {
        return '';
    }
}
