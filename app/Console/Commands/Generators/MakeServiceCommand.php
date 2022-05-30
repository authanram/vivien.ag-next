<?php

namespace App\Console\Commands\Generators;

class MakeServiceCommand extends BaseMakeCommand
{
    protected $name = 'make:service';
    protected $description = 'Create a new service class';
    protected $type = 'Service';

    protected $suffix = 'Service';
    protected $stub = 'service.stub';
    protected $path = 'Services';
    protected $namespace = '\\Services';
}
