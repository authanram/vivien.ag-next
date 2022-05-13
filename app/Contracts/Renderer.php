<?php

namespace App\Contracts;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Stringable;

interface Renderer
{
    public function render(): Stringable|View|string;
}
