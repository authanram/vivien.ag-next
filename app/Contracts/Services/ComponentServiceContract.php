<?php

namespace App\Contracts\Services;

use App\Models\Model;
use Laravel\Nova\Http\Requests\NovaRequest;

interface ComponentServiceContract
{
    public function getFieldsForNova(NovaRequest $request, Model $resource): array;
}
