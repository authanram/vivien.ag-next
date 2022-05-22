<?php

namespace App\Nova\Components\Types;

use App\Contracts\Services\NovaFieldServiceContract;

final class Field extends Type
{
    public static function getTypeFieldOptions(): array
    {
        return resolve(NovaFieldServiceContract::class)->getFields();
    }
}
