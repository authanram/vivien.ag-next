<?php

namespace App;

class Text
{
    public function timeToRead(string $text): string
    {
        $minutes = round(str_word_count($text)/200);

        return $minutes > 0
            ? __(":minutes Min. Lesedauer", compact('minutes'))
            : 'Lesedauer weniger 1 Min.';
    }

    public function truncate(string $text, int $length = 50, string $suffix = '...'): string
    {
        $words = explode(' ', $text);

        return count($words) >= $length
            ? implode(' ', array_slice($words, 0, 50)) . " $suffix "
            : $text;
    }
}
