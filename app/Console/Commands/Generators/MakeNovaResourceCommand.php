<?php

namespace App\Console\Commands\Generators;

use Illuminate\Support\Str;

class MakeNovaResourceCommand extends BaseMakeCommand
{
    protected $name = 'make:nova-resource';
    protected $description = 'Create a new nova resource class';
    protected $type = 'Nova Resource';

    protected $suffix = '';
    protected $stub = 'nova-resource.stub';
    protected $path = 'Nova';
    protected $namespace = '\\Nova';

    protected function replace(string $stub): string
    {
        $name = $this->argument('name');

        return str_replace(
            [
                '{{ label }}',
                '{{ singularLabel }}',
            ],
            [
                Str::of($name)->plural()->title()->toString(),
                Str::of($name)->singular()->title()->toString(),
            ],
            $stub,
        );
    }
}
