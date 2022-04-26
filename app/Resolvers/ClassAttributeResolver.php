<?php

namespace App\Resolvers;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Collection;

class ClassAttributeResolver implements Htmlable
{
    protected string $value;

    protected Collection $values;

    public static function make(string $item, bool $condition = true, string $default = null): self
    {
        return new self($item, $condition, $default);
    }

    private static function clean(string $value): string
    {
        return preg_replace('!\s+!', ' ', $value);
    }

    public function __construct(string $item, bool $condition = true, string $default = null)
    {
        $this->values = collect();
        $this->when($condition, $item, $default);
    }

    final public function add(string $item): self
    {
        return $this->when(true, $item);
    }

    final public function when(bool $condition, string $item, string $default = null): self
    {
        if ($condition) {
            $this->values->add(trim($item));
        } elseif (!empty($default)) {
            $this->values->add(trim($default));
        }

        return $this;
    }

    final public function toHtml(): string
    {
        return sprintf('class="%s"', e($this->get()));
    }

    final public function __toString(): string
    {
        return $this->get();
    }

    private function get(): string
    {
        return static::clean(
            $this->values
                ->filter()
                ->sort()
                ->implode(' ')
        );
    }
}
