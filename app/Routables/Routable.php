<?php

namespace App\Routables;

use App\Http\Controllers\Controller;

abstract class Routable
{
    abstract public function controller(): Controller|string;

    public function action(): string
    {
        return 'index';
    }

    public function toArray(): array
    {
        return [$this->controller(), $this->action()];
    }
}
