<?php

namespace App\Repositories;

use App\Models\EventTemplate as Model;
use Google\Service\CloudBuild\Build;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class EventTemplates extends Repository
{
    public function whereInEvents(Build|Collection $subject): Collection
    {
        return $subject->pluck('eventTemplate')->unique();
    }

    protected static function model(): Builder|string
    {
        return Model::class;
    }
}
