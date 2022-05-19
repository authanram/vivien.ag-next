<?php

namespace App\PresentersNew;

use App\Transformers\BaseTransformer;
use Closure;
use Eloquent;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Prettus\Repository\Presenter\FractalPresenter;

abstract class BasePresenter extends FractalPresenter
{
    protected Closure $entityResolver;

    public function getTransformer(): BaseTransformer
    {
        $transformer = self::basename()
            ->prepend('\\App\\Transformers\\')
            ->append('Transformer')
            ->toString();

        return class_exists($transformer) === false
            ? new BaseTransformer()
            : new $transformer();
    }

    public function setEntityResolver(callable $entityResolver): static
    {
        $this->entityResolver = $entityResolver;

        return $this;
    }

    protected function resolve(): Eloquent
    {
        return call_user_func($this->entityResolver);
    }

    private static function basename(): Stringable
    {
        return Str::of(static::class)
            ->afterLast('\\')
            ->before('Presenter');
    }
}
