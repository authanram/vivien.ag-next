<?php

use Illuminate\View\ComponentAttributeBag;

function attributes(array $attributes = []): ComponentAttributeBag {
    return new ComponentAttributeBag($attributes);
}
