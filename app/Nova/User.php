<?php

namespace App\Nova;

use Illuminate\Http\Request;
use KABBOUCHI\NovaImpersonate\Impersonate;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;

class User extends Resource
{
    public static $group = 'System';

    public static $model = \App\User::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
        'email',
    ];

    final public function fields(Request $request): array
    {
        return [
            ID::make()->sortable()
            ,
            Gravatar::make()->maxWidth(50)
            ,
            Text::make(__('Name'), 'name')
                ->sortable()
                ->rules('required', 'max:255')
            ,
            Text::make(__('Email'), 'email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}')
            ,
            Password::make(__('Password'), 'password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8')
            ,
            HasMany::make(__('Sessions'), 'sessions')
            ,
            Impersonate::make($this)
            ,
        ];
    }
}
