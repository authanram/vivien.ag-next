<?php

namespace App\Contracts;

interface Renderable
{
    public static function renderer(): Renderer|string;
}
