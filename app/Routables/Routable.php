<?php

namespace App\Routables;

use App\ClassMethodsResolver;
use App\Contracts\Support\RoutableContract;
use App\Http\Controllers\Controller;
use App\Models\Model;

abstract class Routable
{
    abstract public static function controller(): Controller|string;

    public static function model(): Model|string|null
    {
        return null;
    }

    public static function routable(?string $action): ?RoutableContract
    {
        return self::{(($action ?? 'selection').'Action')}($action);
    }

    private static function selectionAction(?string $action): RoutableContract
    {
        ray($action);

        return new \App\Support\Routable(
            'index',
            'action',
            'Action',
            [],
        );
    }

    private static function indexAction(): RoutableContract
    {
        ray(__METHOD__);

        //return new \App\Support\Routable();
    }

    private static function detailAction(): RoutableContract
    {
        ray(__METHOD__);

        //return new \App\Support\Routable();
    }
}
