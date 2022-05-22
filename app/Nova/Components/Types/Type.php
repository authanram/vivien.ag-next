<?php

namespace App\Nova\Components\Types;

abstract class Type
{
    abstract public static function getTypeFieldOptions(): array;
}
