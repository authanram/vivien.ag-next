<?php

namespace App;

use Illuminate\Http\Request;

final class FilterUrl
{
    protected string $url = '';

    public static function make(string $path, mixed $value = null, Request $request = null): self
    {
        return new self($path, $value, $request ?? request());
    }

    public function __construct(string $path, mixed $value, Request $request)
    {
        $params = [];

        $value = (string)$value;

        $requestParams = $request->all();

        if ($value !== data_get($requestParams, $path)) {
            $values = explode(',', data_get($requestParams, $path));

            $value = in_array($value, $values, true)
                ? array_filter($values, static fn ($subject) => $subject !== $value)
                : array_merge($values, [$value]);

            $value = implode(',', $value);

            data_set($params, $path, trim($value, ','));
        }

        $this->url = filled($params)
            ? '?'.urldecode(http_build_query($params))
            : $request->url();
    }

    public function __toString(): string
    {
        return $this->url;
    }
}
