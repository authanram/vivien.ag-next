<?php

namespace App\Presenters\Models;

use App\Facades\Site;
use App\Presenters\Presenter;
use Illuminate\Http\Request;

class ContentViewPresenter extends Presenter
{
    public function render(Request $request): string
    {
        $body = $this->get('body');

        foreach ($this->get('contentBlocks') as $block) {
            $block->body = Site::parsers()::markdownParser()->parse($block->body, $request);

            $body = str_replace(
                array_merge(['%block:' . $block->pivot->slug . '%', '%block:' . $block->pivot->id . '%']),
                array_merge([$block->body, $block->body]),
                $body,
            );
        }

        return $body;
    }
}
