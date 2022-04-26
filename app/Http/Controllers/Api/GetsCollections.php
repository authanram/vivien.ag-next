<?php

namespace App\Http\Controllers\Api;

use App\Models\EventLocation;
use App\Models\EventType;
use App\Models\Tag;
use App\Models\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

trait GetsCollections
{
    private static function getEventTypesByEvents(Collection $events): Collection
    {
        return EventType::find(
            $events->pluck('event_type_id')->unique()->toArray(),
            ['id', 'color_id', 'name', 'description'],
        );
    }

    private static function getEventLocationsByEvents(Collection $events): Collection
    {
        return EventLocation::find(
            $events->pluck('event_location_id')->unique()->toArray(),
            ['id', 'name', 'description', 'address', 'url'],
        );
    }

    private static function getTaggablesByEntities(Collection $entities): Collection
    {
        $ids = $entities->pluck('id')
            ->unique()
            ->toArray();

        $taggableTypes = $entities
            ->map(fn ($entity) => get_class($entity))
            ->unique()
            ->toArray();

        return Taggable::whereIn('taggable_type', $taggableTypes)
            ->whereIn('taggable_id', $ids)
            ->get()
            ->each(static function (Taggable $taggable) {
                $classname = '\\' . $taggable->getAttribute('taggable_type');
                $taggableType = static::resolveEntityType(new $classname);
                return $taggable->setAttribute('taggable_type', $taggableType);
            });
    }

    private static function getTagsByTaggables(Collection $taggables): Collection
    {
        return Tag::find(
            $taggables->pluck('tag_id')->unique()->toArray(),
            ['id', 'name', 'slug', 'type', 'color_id', 'order_column'],
        );
    }

    private static function resolveEntityType(Model $entity): string
    {
        return strtolower(Str::plural(class_basename($entity)));
    }
}
