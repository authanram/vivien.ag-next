<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

final class FilterUrl
{
    protected string $url = '';

    public static function make(Request|array $request, array $params): self
    {
        $requestParams = is_array($request) ? $request : $request->all();

        return new self($requestParams, $params);
    }

    public function __construct(array $requestParams, array $params)
    {
        $params = self::filters($requestParams, $params);

        $this->url = urldecode(http_build_query($params));
    }

    public function __toString(): string
    {
        return $this->url;
    }

    protected static function filters(array $requestParams, array $params): array
    {
        return collect($params)->keys()->mapWithKeys(fn (string $key) => [
            "filter[$key]" => self::diff($params[$key], $requestParams[$key])->implode(','),
        ])->toArray();
    }

    protected static function diff(mixed $valueA, mixed $valueB): Collection
    {
        return collect(self::valueToArray($valueA))->diff(self::valueToArray($valueB));
    }

    protected static function valueToArray(mixed $value): array
    {
        return is_array($value) === false ? [$value] : $value;
    }
}
