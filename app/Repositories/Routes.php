<?php

namespace App\Repositories;

use App\Models\Route;
use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final class Routes extends Repository
{
    protected static Model|string $model = Route::class;

    public function all(): Collection
    {
        return self::model()::where('published', true)->get();
    }

    public function findByName(string $name): Eloquent|Route|null
    {
        return self::model()::firstWhere('name', $name);
    }
}
