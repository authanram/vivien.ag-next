<?php

namespace App\Nova;

use App\Models\ContentPage;
use Illuminate\Support\Str;

trait HasPivotAttributeSection
{
    private static function sections(ContentPage $resource): array
    {
        return collect($resource->sections)->mapWithKeys(function (array $section) {
            return [$section['attributes']['name'] => self::sectionName($section)];
        })->toArray();
    }

    private static function sectionName(array $section): string
    {
        return __(Str::of($section['attributes']['name'])->title()->toString());
    }
}
