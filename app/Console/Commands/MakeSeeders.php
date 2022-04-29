<?php

namespace App\Console\Commands;

use Artisan;
use Illuminate\Console\Command;

class MakeSeeders extends Command
{
    protected $signature = 'vivien:make:seeders';

    protected $description = 'Create table seeders';

    public function handle(): int
    {
        $this->line('');
        $this->line('Making Seeders...');
        $this->line('');

        Artisan::call('seed', [
            'tables'  => implode(',', config('project-seeders')),
            '--force' => true,
        ]);

        $this->info(Artisan::output());

        return 0;
    }
}
