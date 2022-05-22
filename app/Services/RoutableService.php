<?php

namespace App\Services;

use App\Contracts\Services\RoutableServiceContract as Contract;
use App\Models\Route;
use App\Routables\RoutableType;
use Laravel\Nova\Http\Requests\NovaRequest;

final class RoutableService implements Contract
{
    public static function getFieldsForNova(NovaRequest $request, Route $resource): array
    {
        return RoutableType::getFieldsForNova($request, $resource);
    }
}
