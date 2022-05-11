<?php

namespace App\Presenters\Models;

use App\Presenters\Presenter;

abstract class ContentBlockPresenter extends Presenter
{
    abstract public function render(): string;
}
