<?php

namespace App\Console\Commands\Generators;

use Illuminate\Foundation\Console\ConsoleMakeCommand;

class MakeCommandCommand extends ConsoleMakeCommand
{
    use GetsNameArgument;
    use HasCommandOptions;

    protected string $suffix = 'Command';
}
