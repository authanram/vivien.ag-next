<?php

namespace App\Presenters\Models;

use App\Models\Catering;
use App\Presenters\Presenter;

/**
 * @property Catering $entity
 */
class CateringPresenter extends Presenter
{
    public static function default(): ?Catering
    {
        return Catering::firstWhere('is_selected');
    }
}
