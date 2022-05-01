<?php

namespace App\Repositories;

use App\Models\Content as Model;
use Illuminate\Database\Eloquent\Builder;

final class Contents extends Repository
{
    public static function model(): Builder|string
    {
        return Model::query();
    }

    public function findBySlug(string $slug): ?string
    {
        return $this->builder()->firstWhere('slug', $slug)?->body;
    }
}
