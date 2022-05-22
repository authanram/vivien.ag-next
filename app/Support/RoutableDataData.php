<?php

namespace App\Support;

use App\Contracts\Support\RoutableDataContract;
use App\Routables\Routable;

class RoutableDataData extends ValueObject implements RoutableDataContract
{
    public function __construct(
        private Routable|string $type,
        private string $value,
        private string $attribute,
        private string $name,
        private array $options,
    ){}

    public function getType(): Routable|string
    {
        return $this->type;
    }

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
