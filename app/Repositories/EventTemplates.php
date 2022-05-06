<?php

namespace App\Repositories;

use App\Models\EventTemplate;
use Illuminate\Database\Eloquent\Model;

final class EventTemplates extends Repository
{
    protected static Model|string $model = EventTemplate::class;
}
