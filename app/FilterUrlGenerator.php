<?php

namespace App;

use Illuminate\Http\Request;

final class FilterUrlGenerator
{
    protected string $filterValue;
    protected string $filterName;

    public function __construct(protected Request $request, protected array $filters)
    {
    }

    public function with(mixed $filterValue, string $filterName): string
    {
        $this->filterValue = (string)$filterValue;

        $this->filterName = $filterName;

        return $this->url();
    }

    protected function url(): string
    {
        $parameters = $this->parameters();

        $query = http_build_query($parameters);

        return urldecode($query !== '' ? "?$query" : $this->request->url());
    }

    protected function parameters(): array
    {
        $values = $this->values();

        if ($this->isActive() === false) {
            $values[] = $this->filterValue;
        } else {
            $values = array_filter($values, fn ($value) => $value !== $this->filterValue);
        }

        $parameters = $this->request->all();

        if ($values === []) {
            unset($parameters['filter'][$this->filterName]);

            return $parameters;
        }

        return data_set($parameters, 'filter.'.$this->filterName, trim(implode(',', $values), ','));
    }

    protected function isActive(): bool
    {
        return in_array($this->filterValue, $this->values(), true);
    }

    protected function values(): array
    {
        return explode(',', data_get($this->request, 'filter.'.$this->filterName, ''));
    }
}
