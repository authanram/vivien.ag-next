<?php

namespace App;

use Illuminate\Support\Facades\Blade;

class Nova
{
    public static string $brandColorDefaultRgb = '208,18,87';

    public static function brandColors(?string $rgb): array
    {
        $rgb ??= static::$brandColorDefaultRgb;

        return collect(self::brandColorShades())
            ->mapWithKeys(static fn (string $value, string $key) => [$key => "$rgb, $value"])
            ->toArray();
    }

    public static function brandColorsCSS(?string $rgb): string
    {
        return Blade::render('
:root {
@foreach($colors as $key => $value)
    --colors-primary-{{ $key }}: {{ $value }};
@endforeach
}', [
            'colors' => static::brandColors($rgb),
        ]);
    }

    public static function brandColorShades(): array
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
