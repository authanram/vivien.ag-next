<?php

namespace App;

use Illuminate\Support\Facades\Blade;

class Colors
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

    public static function brandColors(?string $hex): array
    {
        $rgb = static::hexToRgb($hex ?? '#d01257');

        return collect(self::shades())
            ->mapWithKeys(static fn (string $value, string $key) => [$key => "$rgb, $value"])
            ->toArray();
    }

    public static function brandColorsCSS(?string $hex): string
    {
        return Blade::render('
:root {
@foreach($colors as $key => $value)
    --colors-primary-{{ $key }}: {{ $value }};
@endforeach
}', [
            'colors' => static::brandColors($hex),
        ]);
    }

    private static function shades(): array
    {
        return [
            100 => '0.10',
            200 => '0.5',
            300 => '0.5',
            400 => '0.5',
            500 => '0.75',
            600 => '0.75',
            700 => '0.75',
            800 => '0.75',
            900 => '0.75',
        ];
    }
}
