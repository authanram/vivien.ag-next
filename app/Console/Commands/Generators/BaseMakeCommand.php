<?php

namespace App\Console\Commands\Generators;

use Illuminate\Console\GeneratorCommand;

abstract class BaseMakeCommand extends GeneratorCommand
{
    use HasCommandOptions;

    protected $suffix;
    protected $stub;
    protected $path;
    protected $namespace;

    public function handle(): bool
    {
        return (parent::handle() === false && $this->option('force') === false) === false;
    }

    protected function getNameInput(): string
    {
        return trim($this->argument('name')).$this->suffix;
    }

    protected function getStub(): string
    {
        return $this->resolveStubPath('/stubs/'.$this->stub);
    }

    protected function resolveStubPath($stub): string
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : __DIR__.$stub;
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return is_dir(app_path($this->path))
            ? $rootNamespace.$this->namespace
            : $rootNamespace;
    }

    protected function buildClass($name): string
    {
        $stub = parent::buildClass($name);

        return method_exists($this, 'replace')
            ? $this->replace($stub)
            : $stub;
    }
}
