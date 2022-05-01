<?php

namespace App\Contracts;

interface IconRendererContract
{
    public function render(string $icon): string;
}
