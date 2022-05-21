<?php

namespace App;

use Illuminate\Support\Collection;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

class ClassMethodsResolver
{
    /**
     * @throws ReflectionException
     */
    public static function resolve(string $classname): Collection
    {
        return collect((new ReflectionClass($classname))->getMethods())
            ->filter(static fn (ReflectionMethod $method) => $method->isPublic())
            ->filter(static fn (ReflectionMethod $method) => $method->class === $classname)
            ->map(static fn (ReflectionMethod $method) => $method->getName());
    }
}
