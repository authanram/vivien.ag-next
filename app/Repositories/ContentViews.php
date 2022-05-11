<?php

namespace App\Repositories;

use App\Models\ContentView;
use Illuminate\Database\Eloquent\Model;

final class ContentViews extends Repository
{
    protected static Model|string $model = ContentView::class;

    public function findBySlug(string $slug): ?string
    {
        return $this->getBuilder()
            ->where('slug', $slug)
            ->where('type', ContentView::class)
            ->first()
            ?->body;
    }
}
