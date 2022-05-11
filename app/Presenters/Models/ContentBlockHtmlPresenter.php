<?php

namespace App\Presenters\Models;

use App\Models\ContentBlock;

/**
 * @property ContentBlock $entity
 */
class ContentBlockHtmlPresenter extends ContentBlockPresenter
{
    public function render(): string
    {
        return $this->entity->value;
    }
}
