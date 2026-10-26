<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Concerns\HasUuids as BaseUuids;

trait HasUuids
{
    use BaseUuids;

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
