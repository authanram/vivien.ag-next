<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\EventTemplate;
use Illuminate\Console\Command;

class EventsReattach extends Command
{
    protected $signature = 'vivien:events:reattach {fromEventTemplateId} {toEventTemplateId} {--delete}';

    protected $description = 'Reattach events';

    public function handle(): int
    {
        $from = $this->argument('fromEventTemplateId');

        $to = $this->argument('toEventTemplateId');

        Event::where('event_template_id', $from)
            ->get()
            ->each(function (Event $event) use ($from, $to) {
                $this->line("Detach from $from, attach to $to");
                $event->setAttribute('event_template_id', $to)->save();
            });

        $eventTemplate = EventTemplate::with(['events'])->find($from);

        if ($this->option('delete') && $eventTemplate?->events->isEmpty()) {
            $this->warn(sprintf('Event template "%s" has been deleted.', $eventTemplate->name));
            $eventTemplate->forceDelete();
        }

        return static::SUCCESS;
    }
}
