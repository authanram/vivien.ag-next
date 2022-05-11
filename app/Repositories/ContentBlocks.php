<?php

namespace App\Repositories;

use App\Models\ContentBlock;
use Illuminate\Database\Eloquent\Model;

final class ContentBlocks extends Repository
{
    protected static Model|string $model = ContentBlock::class;

    public function findBySlug(string $slug): ?string
    {
        return $this->getBuilder()->firstWhere('slug', $slug)?->body;
    }
}
