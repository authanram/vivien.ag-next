<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use App\Models\Model;
use App\Models\Post;
use Carbon\Carbon;

class ActivitiesController extends ApiController
{
    use GetsCollections;

    final public function recent(): array
    {
        $eventNew = new Event;

        $events = Event::where([
            ['published', true],
            ['date_to', '>=', Carbon::now()],
        ])
            ->with([
                'eventLocation:' . implode(',', static::getEventLocationColumns()),
                'eventType:' . implode(',', static::getEventTypeColumns()),
            ])
            ->limit(2)
            ->orderByDesc('created_at')
            ->get(\array_merge(['id', ...$eventNew->getFillable()]))
            ->all();

        $posts = Post::limit(3 - count($events))
            ->orderByDesc('created_at')
            ->get(static::getPostColumns())
            ->map(static function (Post $post) {
                return $post;
            })
            ->all();

        $recentActivities = collect(\array_merge($events, $posts));

        $taggables = static::getTaggablesByEntities($recentActivities);

        $tags = static::getTagsByTaggables($taggables);

        $activities = [];

        $recentActivities->each(static function(Model $activity) use (&$activities) {
            $activities[] = [
                'id' => $activity->getAttribute('id'),
                'entity' => $activity->getAttribute('entity_type'),
            ];
        });

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

            $actionable = static::formatDate($actionable, $date, $date . '_readable');

        }

        return $actionable;
    }

    private static function formatDate(Model $actionable, string $sourceColumn, string $targetColumn): Model
    {
        if (!\array_key_exists($sourceColumn, $actionable->getAttributes())
            || !$actionable->getAttribute($sourceColumn)
        ) {
            return $actionable;
        }

        $date = $actionable->getAttribute($sourceColumn)->format(dateFormat());

        return $actionable->setAttribute($targetColumn, $date);
    }

    private static function getPostColumns(): array
    {
        return [
            'id',
            'title',
            'slug',
            'body',
            'published_at'
        ];
    }

    private static function getEventLocationColumns(): array
    {
        return [
            'id',
            'name',
            'description',
            'address',
            'url',
        ];
    }

    private static function getEventTypeColumns(): array
    {
        return [
            'id',
            'color_id',
            'name',
            'description',
        ];
    }
}
