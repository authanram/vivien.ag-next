<?php

namespace App\Support;

use App\Contracts\Support\RouteContract;
use App\Http\Controllers\Controller;

class Route extends ValueObject implements RouteContract
{
    public function getController(): Controller|string
    {
        return '';
    }

    public function getControllerAction(): string
    {
        return '';
    }

    public function getMethod(): string
    {
        return '';
    }

    public function getMiddlewares(): array
    {
        return [];
    }

    public function getName(): string
    {
        return '';
    }

    public function getUri(): string
    {
        return '';
    }
}
