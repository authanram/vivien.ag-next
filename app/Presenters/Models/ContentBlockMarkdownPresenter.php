<?php

namespace App\Presenters\Models;

use App\Facades\Site;
use App\Models\ContentBlock;

/**
 * @property ContentBlock $entity
 */
class ContentBlockMarkdownPresenter extends ContentBlockPresenter
{
    public function render(): string
    {
        return Site::parsers()::markdownParser()->parse($this->entity->value);
    }
}
