<?php

namespace App\Console\Commands\Generators;

use Illuminate\Foundation\Console\RequestMakeCommand;

class MakeRequestCommand extends RequestMakeCommand
{
    use GetsNameArgument;
    use HasCommandOptions;

    protected string $suffix = 'Request';
}
