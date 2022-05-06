<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface ContentRendererContract
{
    public function render(Request $request, string $subject, array $replace = []): string;
}
