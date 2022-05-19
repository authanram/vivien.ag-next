<?php

namespace App\Models;

use App\Presenters\StaticAttributePresenter as Presenter;
use App\Support\StaticAttribute as ValueObject;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaticAttribute extends Model
{
    use HasPresenter;
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'name',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function value(): Attribute
    {
        return Attribute::make(
            get: static fn ($value, $attributes) => new ValueObject(
                json_decode($attributes['data'], true, 512, JSON_THROW_ON_ERROR)['value'],
            ),
        );
    }
}
