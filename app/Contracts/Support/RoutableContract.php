<?php

namespace App\Contracts\Support;

interface RoutableContract
{
    public function getValue(): int|string;

    public function getAttribute(): string;

    public function getName(): string;

    public function getOptions(): array;
}
