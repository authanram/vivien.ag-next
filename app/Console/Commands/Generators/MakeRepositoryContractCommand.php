<?php

namespace App\Console\Commands\Generators;

class MakeRepositoryContractCommand extends BaseMakeCommand
{
    protected $name = 'make:repository-contract';
    protected $description = 'Create a new repository contract';
    protected $type = 'Repository Contract';

    protected $suffix = 'RepositoryContract';
    protected $stub = 'repository-contract.stub';
    protected $path = 'Contracts/Repositories';
    protected $namespace = '\\Contracts\\Repositories';
}
