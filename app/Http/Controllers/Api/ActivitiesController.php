<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use App\Models\Model;
use App\Models\Post;
use Carbon\Carbon;

final class ActivitiesController extends ApiController
{
    use GetsCollections;

    public function recent(): array
    {
        $eventNew = new Event;

        $events = Event::where([
            ['published', true],
            ['date_to', '>=', Carbon::now()],
        ])->with([
            'eventLocation:' . implode(',', self::getEventLocationColumns()),
            'eventType:' . implode(',', self::getEventTypeColumns()),
        ])
        ->limit(2)
        ->orderByDesc('created_at')
        ->get(array_merge(['id', ...$eventNew->getFillable()]))
        ->all();

        $posts = Post::limit(3 - count($events))
            ->orderByDesc('created_at')
            ->get(self::getPostColumns())
            ->map(static fn (Post $post) => $post)
            ->all();

        $recentActivities = collect(array_merge($events, $posts));

        $taggables = self::getTaggablesByEntities($recentActivities);

        $tags = self::getTagsByTaggables($taggables);


        $activities = $recentActivities->map(static fn (Model $activity) => [
            'id' => $activity->getAttribute('id'),
            'entity' => $activity->getAttribute('entity_type'),
        ]);

        $eventLocations = $recentActivities->pluck('eventLocation');

        $eventTypes = $recentActivities->pluck('eventType');

        return compact(
            'activities',
            'events',
            'eventLocations',
            'eventTypes',
            'posts',
            'taggables',
            'tags',
        );
    }

    private static function formatActionableDates(Model $actionable): Model
    {
        $dates = $actionable->getDates();

        foreach ($dates as $date) {
            $actionable = self::formatDate($actionable, $date, $date . '_readable');
        }

        return $actionable;
    }

    private static function formatDate(Model $actionable, string $sourceColumn, string $targetColumn): Model
    {
        if (array_key_exists($sourceColumn, $actionable->getAttributes()) === false
            || $actionable->getAttribute($sourceColumn) === false
        ) {
            return $actionable;
        }

        $date = $actionable->getAttribute($sourceColumn);

        return $actionable->setAttribute($targetColumn, $date);
    }

    private static function getPostColumns(): array
    {
        return ['id', 'title', 'slug', 'body', 'published_at'];
    }

    private static function getEventLocationColumns(): array
    {
        return ['id', 'name', 'description', 'address', 'url'];
    }

    private static function getEventTypeColumns(): array
    {
        return ['id', 'color_id', 'name', 'description'];
    }
}
