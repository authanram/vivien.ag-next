<?php

namespace App\Repositories;

use App\Models\Content as Model;
use Illuminate\Database\Eloquent\Builder;

final class Contents extends Repository
{
    public static function model(): Builder|Model
    {
        return Model::query();
    }

    public function findBySlug(string $slug): ?string
    {
        return $this->getBuilder()->firstWhere('slug', $slug)?->body;
    }
}
