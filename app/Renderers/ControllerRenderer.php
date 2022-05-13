<?php

namespace App\Renderers;

use App\Contracts\Renderer;
use App\Models\Controller;
use Illuminate\Contracts\View\View;

final class ControllerRenderer implements Renderer
{
    public function __construct(protected Controller $controller)
    {
    }

    public function render(): View|string
    {
        return __CLASS__;
    }
}
