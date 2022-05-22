<?php

namespace App\Routables;

use App\Models\Route;
use Laravel\Nova\Http\Requests\NovaRequest;

final class WelcomeRoutable extends Routable
{
    public static function getName(): string
    {
        return __('Welcome');
    }

    public static function getValueFieldOptions(NovaRequest $request, Route $resource): array
    {
        return [
            'index' => 'index',
        ];
    }
}
