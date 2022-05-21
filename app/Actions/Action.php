<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;

abstract class Action
{
    use AsAction;

    abstract public function handle();
}
