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
        $body = $this->get('body');

        foreach ($this->get('contentBlocks') as $block) {
            $body = str_replace(
                ['%block:' . $block->pivot->slug . '%', '%block:' . $block->pivot->id . '%'],
                [$block->body, $block->body],
                $body,
            );
        }

        return $body;
    }
}
