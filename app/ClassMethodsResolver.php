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
        $classname = ltrim($classname, '\\');

        return collect((new ReflectionClass($classname))->getMethods())
            ->filter(static fn (ReflectionMethod $method) => $method->isPublic())
            ->filter(static fn (ReflectionMethod $method) => ltrim($method->class, '\\') === $classname)
            ->map(static fn (ReflectionMethod $method) => $method->getName());
    }
}
