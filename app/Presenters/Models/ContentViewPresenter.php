<?php

namespace App\Presenters\Models;

use App\Models\ContentView;
use App\Presenters\Presenter;

/**
 * @property ContentView $entity
 */
class ContentViewPresenter extends Presenter
{
    public function render(): string
    {
        $body = $this->entity->body;

        foreach ($this->entity->contentBlocks as $block) {
            $body = str_replace(
                ['%block:' . $block->slug . '%', '%block:' . $block->id . '%'],
                [$block->body, $block->body],
                $body,
            );
        }

        return $body;
    }
}
