<?php

namespace App\Console\Commands\Generators;

use Illuminate\Support\Str;

class MakePresenterCommand extends BaseMakeCommand
{
    protected $name = 'make:presenter';
    protected $description = 'Create a new presenter class';
    protected $type = 'Presenter';

    protected $suffix = 'Presenter';
    protected $stub = 'presenter.stub';
    protected $path = 'Presenters';
    protected $namespace = '\\Presenters';

    protected function replace(string $stub): string
    {
        $name = $this->argument('name');

        return str_replace(
            [
                '{{ model }}',
            ],
            [
                Str::of($name)->studly()->toString(),
            ],
            $stub,
        );
    }
}
