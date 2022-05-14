<?php

namespace App;

use App\Contracts\IconRenderer;
use App\Contracts\MarkdownRenderer;
use App\Contracts\Renderer;

class Renderers
{
    public static function icon(): Renderer
    {
        return resolve(IconRenderer::class);
    }

    public static function markdown(): Renderer
    {
        return resolve(MarkdownRenderer::class);
    }
}
