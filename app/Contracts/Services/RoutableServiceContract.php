<?php

namespace App\Contracts\Services;

use App\Models\Route;
use Laravel\Nova\Http\Requests\NovaRequest;

interface RoutableServiceContract
{
    public static function getFieldsForNova(NovaRequest $request, Route $resource): array;
}
