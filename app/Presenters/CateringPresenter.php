<?php

namespace App\Presenters;

use App\Models\Catering;

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
