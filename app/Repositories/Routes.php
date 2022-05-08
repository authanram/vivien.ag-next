<?php

namespace App\Repositories;

use App\Models\Route;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final class Routes extends Repository
{
    protected static Model|string $model = Route::class;

    public function all(): Collection
    {
        return self::model()::where('published', true)
            ->get(['id', 'uri', 'name', 'action']);
    }
}
