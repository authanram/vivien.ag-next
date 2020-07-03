<?php

namespace App\Http\Controllers\Api;

use App\Color;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ColorsController extends ApiController
{
    final public function fetch(Request $request): Collection
    {
        return static::get();
    }

    public static function get(): Collection
    {
        return Color::all(['id', 'color']);
    }
}
