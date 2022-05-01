<?php

namespace App\Contracts;

interface ContentRendererContract
{
    public function render(string $subject, array $replace = []): string;
}
