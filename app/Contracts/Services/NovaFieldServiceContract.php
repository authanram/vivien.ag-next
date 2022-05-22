<?php

namespace App\Contracts\Services;

use Illuminate\Support\Collection;

interface NovaFieldServiceContract
{
    public function getFields(): array;
}
