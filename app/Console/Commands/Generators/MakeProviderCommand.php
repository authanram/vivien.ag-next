<?php

namespace App\Console\Commands\Generators;

use Illuminate\Foundation\Console\ProviderMakeCommand;

class MakeProviderCommand extends ProviderMakeCommand
{
    use GetsNameArgument;
    use HasCommandOptions;

    protected string $suffix = 'ServiceProvider';
}
