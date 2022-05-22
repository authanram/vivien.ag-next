<?php

use App\Nova\Components\Types;
use Laravel\Nova\Fields;

return [

    'fields_ignore' => [
        Fields\ID::class,
        Fields\VaporFile::class,
        Fields\VaporImage::class,
    ],

    'types' => [
        Types\Component::class,
        Types\Field::class,
    ],

];
