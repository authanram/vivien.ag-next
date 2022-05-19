<?php

namespace App;

class Color
{
    private static string $template = '#%02x%02x%02x';

    public static function hexToRgb(string $value): string
    {
        [$r, $g, $b] = sscanf($value, self::$template);

        return "$r,$g,$b";
    }

    public static function rgbToHex(string $value): string
    {
        return sprintf(self::$template, ...explode(',', $value));
    }
}
