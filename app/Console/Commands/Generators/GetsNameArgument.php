<?php

namespace App\Console\Commands\Generators;

use Illuminate\Support\Str;

trait GetsNameArgument
{
    protected function getNameInput(): string
    {
        return Str::of($this->argument('name'))
            ->trim()
            ->before($this->suffix ?? '')
            ->append($this->suffix ?? '');
    }
}
