<?php

namespace App\Console\Commands\Generators;

class MakeDataContractCommand extends BaseMakeCommand
{
    protected $name = 'make:data-contract';
    protected $description = 'Create a new data object contract';
    protected $type = 'Data Object Contract';

    protected $suffix = 'DataContract';
    protected $stub = 'data-contract.stub';
    protected $path = 'Contracts/Support';
    protected $namespace = '\\Contracts\\Support';
}
