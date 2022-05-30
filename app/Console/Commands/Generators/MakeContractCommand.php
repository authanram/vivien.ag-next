<?php

namespace App\Console\Commands\Generators;

class MakeContractCommand extends BaseMakeCommand
{
    protected $name = 'make:contract';
    protected $description = 'Create a new contract';
    protected $type = 'Contract';

    protected $suffix = 'Contract';
    protected $stub = 'contract.stub';
    protected $path = 'Contracts';
    protected $namespace = '\\Contracts';
}
