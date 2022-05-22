<?php

namespace App\Routables;

use App\Models\Route;
use Laravel\Nova\Http\Requests\NovaRequest;

abstract class Routable
{
    abstract public static function getName(): string;

    abstract public static function getValueFieldOptions(NovaRequest $request, Route $resource): array;

    abstract public static function getFieldsForNova(NovaRequest $request, Route $resource): array;
}
