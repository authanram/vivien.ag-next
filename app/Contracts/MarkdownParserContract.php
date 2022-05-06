<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface MarkdownParserContract
{
    public function parse(string $text, Request $request = null): string;
}
