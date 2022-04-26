<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

final class EventsController extends ApiController
{
    use GetsCollections;

    /** @noinspection PhpUnusedLocalVariableInspection */
    public function fetch(Request $request, string $filter = null, int $value = null): array
    {
        $compact = self::makeCompact($request);

        $limit = $filter === 'limit' ? $value : null;

        $id = $filter === 'id' ? $value : null;

        $events = $id ? Event::where('id', $id)->get() : self::getUpcomingEvents($limit);

        $eventLocations = self::isCompact($compact, 'eventLocations')
            ? self::getEventLocationsByEvents($events)
            : null;

        $eventTypes = self::isCompact($compact, 'eventTypes')
            ? self::getEventTypesByEvents($events)
            : null;

        $taggables = self::isCompact($compact, 'taggables')
            ? self::getTaggablesByEntities($events)
            : null;

        $tags = self::isCompact($compact, 'tags') && $taggables
            ? self::getTagsByTaggables($taggables)
            : null;

        return compact($compact);
    }

    private static function isCompact(array $compact, string $isCompact): bool
    {
        return in_array($isCompact, $compact, true);
    }

    private static function makeCompact(Request $request): array
    {
        $compact = ['events', 'eventLocations', 'eventTypes', 'taggables', 'tags'];

        if ($request->input('xhr') && $request->input('filter')) {
            $compactXhr = explode(',', $request->input('xhr'));

            $filter = static fn (string $value) => in_array($value, $compact, true);

            $compact = empty($compactXhr) === false
                ? collect($compactXhr)->filter($filter)->toArray()
                : $compact[0];
        }

        return $compact;
    }

    private static function getUpcomingEvents(int $limit = null): Collection
    {
        $collection = QueryBuilder::for(Event::class)->scopes('upcoming');

        if ($limit) {
            $collection::limit($limit);
        }

        return $collection::get(self::getFields());
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
