<?php

namespace App\Contracts\Support;

use App\Routables\Routable;

interface RoutableDataContract extends DataContract
{
    public function getType(): Routable|string;

    public function getValue(): int|string;

    public function getAttribute(): string;

    public function getName(): string;

    public function getOptions(): array;
}
