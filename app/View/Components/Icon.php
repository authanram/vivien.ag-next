<?php

namespace App\View\Components;

use App\Contracts\IconRenderer;
use Illuminate\View\Component;

class Icon extends Component
{
    public ?string $html = null;

    public function __construct(IconRenderer $renderer, string $icon)
    {
        $this->html = $renderer->render($icon);
    }

    public function render(): callable
    {
        return function (array $data) {
            return str_replace('<svg', '<svg '.$data['attributes']->toHtml(), $this->html);
        };
    }
}
