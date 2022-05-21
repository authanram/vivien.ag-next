<?php

namespace App\Contracts\Support;

use App\Http\Controllers\Controller;

interface RouteContract
{
    public function getController(): Controller|string;

    public function getControllerAction(): string;

    public function getMethod(): string;

    /**
     * @return array<object|string>
     * @noinspection PhpDocSignatureInspection
     */
    public function getMiddlewares(): array;

    public function getName(): string;

    public function getUri(): string;
}
