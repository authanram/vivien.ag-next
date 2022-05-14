<?php

namespace App\Presenters;

use App\Facades\Site;

class StaticBlockPresenter extends Presenter
{
    public function render(): string
    {
        return Site::parsers()::markdownParser()->parse($this->entity->value);
    }
}
