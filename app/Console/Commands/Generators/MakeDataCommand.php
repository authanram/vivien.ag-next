<?php

namespace App\Console\Commands\Generators;

use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;

class MakeDataCommand extends BaseMakeCommand
{
    protected $name = 'make:data';
    protected $description = 'Create a new data object';
    protected $type = 'Data Object';

    protected $suffix = 'Data';
    protected $stub = 'data.stub';
    protected $path = 'Support';
    protected $namespace = '\\Support';

    protected function replace(string $stub): string
    {
        $name = $this->argument('model') ?? $this->argument('name');

        return str_replace(
            [
                '{{ modelClass }}',
                '{{ model }}',
            ],
            [
                Str::of($name)->studly()->toString(),
                Str::of($name)->camel()->toString(),
            ],
            $stub,
        );
    }

    protected function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the class'],
            ['model', InputArgument::OPTIONAL, 'The base name of the model class'],
        ];
    }
}
