<?php

namespace App\Routables;

use App\Models\Route;
use Laravel\Nova\Http\Requests\NovaRequest;

final class PostRoutable extends Routable
{
    public static function getName(): string
    {
        return __('Posts');
    }

    public static function getValueFieldOptions(NovaRequest $request, Route $resource): array
    {
        return [
            'index' => 'index',
        ];
    }
}
