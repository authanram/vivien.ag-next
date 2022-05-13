<?php

namespace App\Renderers;

use App\Contracts\Renderer;
use App\Models\Event;
use Illuminate\Contracts\View\View;

final class EventRenderer implements Renderer
{
    public function __construct(protected Event $event)
    {
    }

    public function render(): View|string
    {
        return __CLASS__;
    }
}
