<?php

namespace App\Nova;

use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Vyuldashev\NovaPermission\Permission;
use Vyuldashev\NovaPermission\PermissionBooleanGroup;
use Vyuldashev\NovaPermission\Role;
use Vyuldashev\NovaPermission\RoleBooleanGroup;

class User extends Resource
{
    public static string $model = \App\Models\User::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'email',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()
                ->sortable()
                ->showOnPreview()
            ,
            Gravatar::make()
                ->maxWidth(50)
                ->showOnPreview()
            ,
            Text::make(__('Name'), 'name')
                ->sortable()
                ->rules('required', 'max:255')
                ->showOnPreview()
            ,
            Text::make(__('Email'), 'email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}')
                ->showOnPreview()
            ,
            Password::make(__('Password'), 'password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8')
            ,
            HasMany::make(__('Sessions'), 'sessions', Session::class)
            ,
            RoleBooleanGroup::make('Roles')
                ->hideFromIndex()
                ->showOnPreview()
            ,
            PermissionBooleanGroup::make('Permissions')
                ->hideFromIndex()
                ->showOnPreview()
            ,
        ];
    }

    public static function label(): string
    {
        return __('Users');
    }

    public static function singularLabel(): string
    {
        return __('User');
    }
}
