<?php

namespace App\Console\Commands\Generators;

class MakeServiceContractCommand extends BaseMakeCommand
{
    protected $name = 'make:service-contract';
    protected $description = 'Create a new service contract';
    protected $type = 'Service Contract';

    protected $suffix = 'ServiceContract';
    protected $stub = 'service-contract.stub';
    protected $path = 'Contracts/Services';
    protected $namespace = '\\Contracts\\Services';
}
