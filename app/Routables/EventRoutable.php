<?php

namespace App\Routables;

use App\Models\Route;
use Laravel\Nova\Http\Requests\NovaRequest;

final class EventRoutable extends Routable
{
    public static function getName(): string
    {
        return __('Events');
    }

    public static function getValueFieldOptions(NovaRequest $request, Route $resource): array
    {
        return [
            'index' => 'index',
            'detail' => 'detail',
        ];
    }

    public static function getFieldsForNova(NovaRequest $request, Route $resource): array
    {
        return [];
    }
}
