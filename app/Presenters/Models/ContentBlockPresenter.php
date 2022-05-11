<?php

namespace App\Presenters\Models;

use App\Facades\Site;
use App\Models\ContentBlock;
use App\Presenters\Presenter;

/**
 * @property ContentBlock $entity
 */
class ContentBlockPresenter extends Presenter
{
    public function render(): string
    {
        return Site::parsers()::markdownParser()->parse($this->entity->body);
    }
}
