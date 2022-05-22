<?php

namespace App\Services;

use App\Contracts\Services\ComponentServiceContract as Contract;
use App\Models\Model;
use App\Nova\Components\Fields;
use Laravel\Nova\Http\Requests\NovaRequest;

final class ComponentService implements Contract
{
    public function getFieldsForNova(NovaRequest $request, Model $resource): array
    {
        return [];
    }

    public function getComponentFieldsForNova(NovaRequest $request, Model $resource): array
    {
        return Fields::make($request, $resource);
    }
}
