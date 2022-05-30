<?php

namespace App\Console\Commands\Generators;

use Illuminate\Routing\Console\ControllerMakeCommand;

class MakeControllerCommand extends ControllerMakeCommand
{
    use GetsNameArgument;
    use HasCommandOptions;

    protected string $suffix = 'Controller';
}
