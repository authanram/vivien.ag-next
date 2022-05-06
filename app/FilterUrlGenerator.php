<?php

namespace App;

use Illuminate\Http\Request;

final class FilterUrlGenerator
{
    public function __construct(protected Request $request, protected array $filters)
    {
    }

    public function with(mixed $filterValue, string $filterName): string
    {
        $filters = $this->filters();

        $delimited = implode(',', $this->value($filterName, (string)$filterValue));

        $parametersNew = data_set($filters, $filterName, $delimited);

        $parameters = array_merge($this->request->all(), [
            'filter' => $parametersNew,
        ]);

        $url = $parametersNew[$filterName] === ''
            ? urldecode($this->request->fullUrl())
            : $this->request->fullUrlWithQuery($parameters);

        return urldecode($url);
    }

    protected function value(string $filterName, mixed $filterValue): array
    {
        $filters = $this->filters();

        if (isset($filters[$filterName]) === false) {
            return [];
        }

        $values = explode(',', $filters[$filterName]);

        if (in_array($filterValue, $values, true) === false) {
            $values[] = $filterValue;
            return $values;
        }

        return array_filter($values, static function ($value) use ($filterValue) {
            return (string)$value !== $filterValue;
        });
    }

    protected function filters(): array
    {
        return $this->request->get('filter', []);
    }
}
