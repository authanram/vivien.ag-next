<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\EventTemplate;
use Illuminate\Console\Command;

class CleanupEvents extends Command
{
    protected $signature = 'vivien:cleanup:events';

    protected $description = 'Cleanup events';

    public function handle(): int
    {
        $eventTemplates = [];

        foreach (EventTemplate::all() as $eventTemplate) {
            if (isset($eventTemplates[$eventTemplate->name]) === false) {
                $eventTemplates[$eventTemplate->name] = ['id' => $eventTemplate->id, 'ids' => []];
                continue;
            }

            $eventTemplates[$eventTemplate->name]['ids'][] = $eventTemplate->id;
        }

        $eventTemplates = array_filter($eventTemplates, static fn ($eventTemplates) => $eventTemplates['ids'] !== []);

        dd($eventTemplates);

        foreach ($eventTemplates as $eventTemplate) {
            if ($eventTemplate['ids'] === []) {
                continue;
            }

            Event::whereIn('event_template_id', $eventTemplate['ids'])
                ->get()
                ->each(function ($event) use ($eventTemplate) {
                    $this->info(
                        sprintf(
                            'Set event_template_id from %s to %s.',
                            $event->event_template_id,
                            $eventTemplate['id'],
                        ),
                    );
                    $event->event_template_id = $eventTemplate['id'];
                    $event->save();
                });
        }

        return 0;
    }
}
