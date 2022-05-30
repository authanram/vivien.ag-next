<?php

namespace App\Console\Commands\Generators;

use Illuminate\Foundation\Console\CastMakeCommand;

class MakeCastCommand extends CastMakeCommand
{
    use GetsNameArgument;
    use HasCommandOptions;

    protected string $suffix = 'Cast';
}
