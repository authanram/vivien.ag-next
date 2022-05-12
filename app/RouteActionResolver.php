<?php

namespace App;

use App\Http\Controllers\Controller;

final class RouteActionResolver
{
    protected function __construct(protected array $action)
    {
    }

    public static function make(array $action): self
    {
        return new self($action);
    }

    public function controller(): Controller|string|null
    {
    }
}
