<?php

namespace App\Support;

use App\Contracts\Support\StaticAttributeSupportContract;
use Spatie\LaravelData\Data;

class StaticAttribute extends Data implements StaticAttributeSupportContract
{
    public function __construct(private string $value)
    {}

    public function value(): string
    {
        return $this->value;
    }
}
