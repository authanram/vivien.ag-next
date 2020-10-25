<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakePermissions extends Command
{
    protected $signature = 'vivien:make:permissions';

    protected $description = 'Create permissions based on existing models';

    final public function handle(): int
    {
        $this->newLine();

        $this->line('fff');

        $this->newLine();

        return 0;
    }
}
