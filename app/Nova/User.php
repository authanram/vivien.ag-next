<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Vyuldashev\NovaPermission as Acl;

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
        return collect(
            [
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
                MorphToMany::make('Roles', 'roles', Acl\Role::class)
                ,
                MorphToMany::make('Permissions', 'permissions', Acl\Permission::class)
                ,
            ]
        )->tap(function ($fields) use ($request) {
            if ($request->user()->can('impersonate')) {
                $fields->add(\KABBOUCHI\NovaImpersonate\Impersonate::make($this));
            }
        })->toArray();
    }
}
