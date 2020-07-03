<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

final class StateService
{
    protected array $state = [];

    public function getState(): array
    {
        return $this->state;
    }

    public function add(string $key, Collection $collection): self
    {
        $this->state[$key] = $collection;

        return $this;
    }

    public function merge(array $collections): self
    {
        $this->state = \array_merge($this->state, $collections);

        return $this;
    }
}
