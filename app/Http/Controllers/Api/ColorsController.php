<?php

namespace App\Http\Controllers\Api;

use App\Models\Color;
use Illuminate\Database\Eloquent\Collection;

final class ColorsController extends ApiController
{
    public function fetch(): Collection
    {
        return Color::all(['id', 'color']);
    }
}
