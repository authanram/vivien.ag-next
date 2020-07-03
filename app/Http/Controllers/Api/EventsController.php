<?php

namespace App\Http\Controllers\Api;

use App\Event;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class EventsController extends ApiController
{
    use GetsCollections;

    final public function fetch(Request $request): array
    {
        $compact = static::makeCompact($request);

        $events = static::getUpcomingEvents($request->query('limit'));

        $eventLocations = static::isCompact($compact, 'eventLocations')
            ? static::getEventLocationsByEvents($events)
            : null;

        $eventTypes = static::isCompact($compact, 'eventTypes')
            ? static::getEventTypesByEvents($events)
            : null;

        $taggables = static::isCompact($compact, 'taggables')
            ? static::getTaggablesByEntities($events)
            : null;

        $tags = static::isCompact($compact, 'tags') && $taggables
            ? static::getTagsByTaggables($taggables)
            : null;

        return compact($compact);
    }

    private static function isCompact(array $compact, string $isCompact): bool
    {
        return \in_array($isCompact, $compact, true);
    }

    private static function makeCompact(Request $request): array
    {
        $compact = ['events', 'eventLocations', 'eventTypes', 'taggables', 'tags'];

        if ($request->input('xhr') && $request->input('filter')) {

            $compactXhr = explode(',', $request->input('xhr'));

            $compact = !empty($compactXhr)

                ? collect($compactXhr)->filter(fn (string $value) => \in_array($value, $compact, true))->toArray()

                : $compact[0];
        }

        return $compact;
    }

    private static function getUpcomingEvents(int $limit = null): Collection
    {
        $collection = QueryBuilder::for(Event::class)->scopes('upcoming');

        if ($limit) {

            $collection->limit($limit);

        }

        return $collection->get(static::getFields());
    }

    private static function getFields(): array
    {
        return [
            'events.id',
            'events.event_type_id',
            'events.event_location_id',
            'events.description',
            'events.date_from',
            'events.date_to',
            'events.maximum_attendees',
            'events.reserved_seats',
            'events.price',
            'events.price_note',
            'events.catering',
            'events.lead',
        ];
    }
}
