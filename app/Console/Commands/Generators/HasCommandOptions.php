<?php

namespace App\Console\Commands\Generators;

use Symfony\Component\Console\Input\InputOption;

trait HasCommandOptions
{
    protected function getOptions(): array
    {
        return [
            ...collect(parent::getOptions())
                ->filter(fn ($option) => $option[0] !== 'force')
                ->toArray(),
            ['force', 'f', InputOption::VALUE_NONE, 'Force creation'],
        ];
    }
}
