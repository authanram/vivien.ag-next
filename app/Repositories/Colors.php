<?php

namespace App\Repositories;

use App\Models\Color;
use Illuminate\Database\Eloquent\Model;

final class Colors extends Repository
{
    protected static Model|string $model = Color::class;
}
