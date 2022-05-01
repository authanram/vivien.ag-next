<?php

namespace App\Repositories;

use App\Models\Event as Model;
use Illuminate\Database\Eloquent\Builder;

final class Events extends Repository
{
    public static function model(): Builder|string
    {
        return Model::class;
    }
}
