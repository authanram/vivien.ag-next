<?php

namespace App\Support;

use App\Contracts\Support\RoutableContract;

class Routable extends ValueObject implements RoutableContract
{
    public function __construct(
        private string $value,
        private string $attribute,
        private string $name,
        private array $options,
    ){}

    public function getValue(): int|string
    {
        return $this->value;
    }

    public function getAttribute(): string
    {
        return $this->attribute;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
