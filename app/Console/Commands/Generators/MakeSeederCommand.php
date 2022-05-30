<?php

namespace App\Console\Commands\Generators;

use Illuminate\Database\Console\Seeds\SeederMakeCommand;

class MakeSeederCommand extends SeederMakeCommand
{
    use GetsNameArgument;
    use HasCommandOptions;

    protected string $suffix = 'Seeder';
}
