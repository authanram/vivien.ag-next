<?php

namespace App\Models;

use App\Presenters\Presenter;
use Illuminate\Support\Optional;
use Illuminate\Support\Str;
use Laracasts\Presenter\Exceptions\PresenterException;
use Laracasts\Presenter\PresentableTrait;

class Model extends \Illuminate\Database\Eloquent\Model
{
    use PresentableTrait;

    public static function getTagClassName(): string
    {
        return static::class;
    }

    public function presenter(): Optional|Presenter
    {
        try {
            return parent::present();
        } catch (PresenterException) {
            return optional();
        }
    }

    public function getEntityTypeAttribute(): string
    {
        return Str::studly($this->table);
    }
}
