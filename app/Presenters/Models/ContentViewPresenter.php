<?php

namespace App\Presenters\Models;

use App\Presenters\Presenter;
use Illuminate\Http\Request;

class ContentViewPresenter extends Presenter
{
    public function render(Request $request): string
    {
        $body = $this->get('body');
        $searchAndReplace = config('project.content.replace')($request);
        $search = array_keys($searchAndReplace);
        $replace = array_values($searchAndReplace);

        foreach ($this->get('contentBlocks') as $block) {
            $body = str_replace(
                array_merge(['%block:' . $block->pivot->slug . '%', '%block:' . $block->pivot->id . '%'], $search),
                array_merge([$block->body, $block->body], $replace),
                $body,
            );
        }

        return $body;
    }
}
