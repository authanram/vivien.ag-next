<?php

namespace App\Nova;

use App\Models\User as Model;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Vyuldashev\NovaPermission\PermissionBooleanGroup;
use Vyuldashev\NovaPermission\RoleBooleanGroup;

class User extends Resource
{
    public static string $model = Model::class;

    public static $with = ['settings'];

    public static $title = 'name';

    public static $search = [
        'name',
        'email',
    ];

    public static function label(): string
    {
        return __('Users');
    }

    public static function singularLabel(): string
    {
        return __('User');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()
                ->sortable()
                ->showOnPreview(),

            Gravatar::make()
                ->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->rules('required', 'max:255')
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Email'), 'email')
                ->creationRules('required', 'email', 'max:254', 'unique:users,email')
                ->updateRules('required', 'email', 'max:254', 'unique:users,email,{{resourceId}}')
                ->sortable()
                ->showOnPreview(),

            Password::make(__('Password'), 'password')
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8')
                ->onlyOnForms(),

            HasOne::make(__('User Settings'), 'settings', UserSettings::class)
                ->showOnPreview(),

            HasMany::make(__('Sessions'), 'sessions', Session::class),

            RoleBooleanGroup::make('Roles')
                ->hideFromIndex()
                ->showOnPreview(),

            PermissionBooleanGroup::make('Permissions')
                ->hideFromIndex()
                ->showOnPreview(),
        ];
    }
}
