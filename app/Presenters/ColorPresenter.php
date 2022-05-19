<?php

namespace App\Presenters;

use App\Color as Util;
use App\Models\Color;
use App\Models\Model;
use App\Models\User as Authenticatable;

/**
 * @property Color $entity
 */
class ColorPresenter extends Presenter
{
    public string $rgb;

    public function __construct(Authenticatable|Model $entity)
    {
        parent::__construct($entity);

        $this->rgb = Util::hexToRgb($this->entity->hex);
    }
}
