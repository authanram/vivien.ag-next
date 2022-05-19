<?php

namespace App\RepositoriesNew;

use Illuminate\Support\Str;

abstract class BaseRepository extends \Prettus\Repository\Eloquent\BaseRepository
{
    public function model(): string
    {
        return Str::of(static::class)
            ->afterLast('\\')
            ->before('Repository')
            ->prepend('\\App\\Models\\')
            ->toString();
    }
}
