<?php

namespace App\View\Components;

use Illuminate\View\ComponentAttributeBag;

abstract class Component extends \Illuminate\View\Component
{
    final public function makeAttributes(array $attributes): ComponentAttributeBag
    {
        if ($attributes['class']) {

            $componentClasses = explode(' ', $attributes['class']);

            $this->attributes['class'] = $this->makeClassAttribute($componentClasses);

        }

        return $this->attributes;
    }

    private function makeClassAttribute(array $componentClasses): string
    {
        $classAttributeElements = (array) \explode('reject:', data_get($this->attributes, 'class'));

        $classesToRejection = \explode(' ', $classAttributeElements[1] ?? '');

        $classes = collect($componentClasses)

            ->filter(fn ($class) => !\in_array($class, $classesToRejection, true))

            ->merge($classAttributeElements[0])

            ->filter()

            ->sort()

            ->implode(' ');

        return static::clean($classes);
    }

    private static function clean(string $value): string
    {
        return \preg_replace('!\s+!', ' ', $value);
    }
}
