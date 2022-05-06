<?php

namespace App\Repositories;

use App\Models\Content;
use Illuminate\Database\Eloquent\Model;

final class Contents extends Repository
{
    protected static Model|string $model = Content::class;

    public function findBySlug(string $slug): ?string
    {
        return $this->getBuilder()->firstWhere('slug', $slug)?->body;
    }
}
