<?php

namespace App\Console\Commands\Generators;

use Illuminate\Foundation\Console\PolicyMakeCommand;

class MakePolicyCommand extends PolicyMakeCommand
{
    use GetsNameArgument;
    use HasCommandOptions;

    protected string $suffix = 'Policy';
}
