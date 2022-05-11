<?php

namespace App\Contracts;

interface RenderableComponent
{
    public static function render(mixed $value): string|null;
}
