<?php

use App\Util;
use Illuminate\View\ComponentAttributeBag;

function attributes(array $attributes = []): ComponentAttributeBag {
    return new ComponentAttributeBag($attributes);
}

function util(): Util {
    return resolve(Util::class);
}
