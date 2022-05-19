<?php

namespace App\RepositoriesNew;

use App\PresentersNew\BasePresenter;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

abstract class BaseRepository extends \Prettus\Repository\Eloquent\BaseRepository
{
    protected $skipPresenter = true;

    public function model(): string
    {
        return self::basename()
            ->prepend('\\App\\Models\\')
            ->toString();
    }

    public function presenter(): BasePresenter
    {
        $presenter = self::basename()
            ->prepend('\\App\\PresentersNew\\')
            ->append('Presenter')
            ->toString();

        return new $presenter();
    }

    private static function basename(): Stringable
    {
        return Str::of(static::class)
            ->afterLast('\\')
            ->before('Repository');
    }
}
