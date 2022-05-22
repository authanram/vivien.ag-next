<?php

namespace App\Routables;

use App\Models\Page;
use App\Models\Route;
use Laravel\Nova\Http\Requests\NovaRequest;

final class PageRoutable extends Routable
{
    public static function getName(): string
    {
        return __('Page');
    }

    public static function getValueFieldOptions(NovaRequest $request, Route $resource): array
    {
        return Page::all()->pluck('name', 'id')->sort()->toArray();
    }

    public static function getFieldsForNova(NovaRequest $request, Route $resource): array
    {
        return [];
    }
}
