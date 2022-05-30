<?php

namespace App\Console\Commands\Generators;

class MakeRepositoryCommand extends BaseMakeCommand
{
    protected $name = 'make:repository';
    protected $description = 'Create a new repository class';
    protected $type = 'Repository';

    protected $suffix = 'Repository';
    protected $stub = 'repository.stub';
    protected $path = 'RepositoriesNew';
    protected $namespace = '\\RepositoriesNew';
}
