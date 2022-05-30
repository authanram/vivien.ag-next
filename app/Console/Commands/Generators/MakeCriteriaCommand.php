<?php

namespace App\Console\Commands\Generators;

use Symfony\Component\Console\Input\InputArgument;

class MakeCriteriaCommand extends BaseMakeCommand
{
    protected $name = 'make:criteria';
    protected $description = 'Create a new criteria class';
    protected $type = 'Criteria';

    protected $suffix = 'Criteria';
    protected $stub = 'criteria.stub';
    protected $path = 'RepositoriesNew/Criteria';
    protected $namespace = '\\RepositoriesNew\\Criteria';

    protected function replace(string $stub): string
    {
        $attribute = $this->argument('attribute');
        $type = $this->argument('attributeType');
        $value = $this->argument('attributeValue');

        return str_replace(
            [
                '{{ attributeType }}',
                '{{ attribute }}',
                '{{ attributeValue }}',
            ],
            [
                $type ?? 'bool',
                $attribute ?? 'attribute',
                ($type === 'string' ? "'".$value."'" : $value) ?? 'true',
            ],
            $stub,
        );
    }

    protected function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the class'],
            ['attributeType', InputArgument::OPTIONAL, 'Attribute type'],
            ['attribute', InputArgument::OPTIONAL, 'Attribute name'],
            ['attributeValue', InputArgument::OPTIONAL, 'Attribute default value'],
        ];
    }
}
