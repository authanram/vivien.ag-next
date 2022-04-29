<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

trait HasUuid
{
    final protected function initializeHasUuid(): void
    {
        $keyName = $this->getIncrementing() ? 'id' : 'uuid';

        $this->attributes[$keyName] = $this->attributes[$keyName] ?? Str::orderedUuid()->toString();
    }
}
