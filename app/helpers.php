<?php

use App\Util;
use Illuminate\View\ComponentAttributeBag;
use Spatie\QueryString\QueryString;

function attributes(array $attributes = []): ComponentAttributeBag {
    return new ComponentAttributeBag($attributes);
}

function query(string $uri = null): QueryString {
    return new QueryString($uri ?? '');
}

function util(): Util {
    return resolve(Util::class);
}
