<?php

namespace App;

use App\Contracts\MarkdownParserContract;

class Parsers
{
    public static function markdownParser(): MarkdownParserContract
    {
        return resolve(MarkdownParserContract::class);
    }
}
