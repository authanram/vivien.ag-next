<?php

namespace App\Repositories;

use App\Models\ContentComponent;
use Illuminate\Database\Eloquent\Model;

final class ContentComponents extends Repository
{
    protected static Model|string $model = ContentComponent::class;

    public function findBySlug(string $slug): ?string
    {
        return $this->getBuilder()->firstWhere('slug', $slug)?->body;
    }
}
