<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface MarkdownParserContract
{
    public function parseAndReplace(Request $request, string $text, array $replace = []): string;
}
