<?php

namespace App\Renderers;

use App\Contracts\Renderer;
use App\Models\Page;
use Illuminate\Contracts\View\View;

final class PageRenderer implements Renderer
{
    public function __construct(protected Page $page)
    {
    }

    public function render(): View|string
    {
        return __CLASS__;
    }
}
