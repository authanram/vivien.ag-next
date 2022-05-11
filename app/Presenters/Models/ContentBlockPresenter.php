<?php

namespace App\Presenters\Models;

use App\Facades\Site;
use App\Presenters\Presenter;

class ContentBlockPresenter extends Presenter
{
    public function render(): string
    {
        return Site::parsers()::markdownParser()->parse($this->entity->value);
    }
}
