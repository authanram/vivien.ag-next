<?php

namespace App\Contracts;

interface MarkdownParserContract
{
    public function parse(string $text, array $replace = []): string;
}
