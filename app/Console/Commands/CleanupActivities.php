<?php

namespace App\Console\Commands;

use App\Models\Activity;
use Illuminate\Console\Command;

class CleanupActivities extends Command
{
    protected $signature = 'vivien:cleanup:activities';

    protected $description = 'Cleanup activities table';

    /**
     * @return int
     * @throws \Exception
     */
    final public function handle(): int
    {
        $this->newLine();

        /** @noinspection PhpStaticAsDynamicMethodCallInspection */
        Activity::where('changes', null)
            ->orWhere('changes', '[]')
            ->delete();

        $this->info('Done.');

        $this->newLine();

        return 0;
    }
}
