<?php

namespace App\Repositories;

use App\Models\EventTemplate as Model;
use Illuminate\Database\Eloquent\Builder;

final class EventTemplates extends Repository
{
    protected static function model(): Builder|Model
    {
        return new Model();
    }
}
