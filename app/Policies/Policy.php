<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Str;

abstract class Policy extends SushiPolicy
{
    public function before(User $user): ?bool
    {
        return empty(static::$authorizeBefore) && $user->isAdministrator() ? true : null;
    }

    public function create(User $user): bool
    {
        return static::authorize($user, __FUNCTION__);
    }

    public function viewAny(User $user): bool
    {
        return static::authorize($user, __FUNCTION__);
    }

    public function view(User $user, $model): bool
    {
        return static::authorize($user, __FUNCTION__, $model);
    }

    public function update(User $user, $model): bool
    {
        return static::authorize($user, __FUNCTION__, $model);
    }

    public function delete(User $user, $model): bool
    {
        return static::authorize($user, __FUNCTION__, $model);
    }

    public function restore(User $user, $model): bool
    {
        return static::authorize($user, __FUNCTION__, $model);
    }

    public function forceDelete(User $user, $model): bool
    {
        return static::authorize($user, __FUNCTION__, $model);
    }

    protected static function authorize(User $user, string $function, $model = null): bool
    {
        return isset(static::$authorizeBefore)
        && is_array(static::$authorizeBefore)
        && in_array($function, static::$authorizeBefore, true)
            ? $user->isAdministrator()
            : $user->can($function.':'.static::makeSlug($model));
    }

    protected static function makeSlug($model = null): string
    {
        $subjectBasename = class_basename($model ? get_class($model) : static::class);

        $basename = Str::before($subjectBasename, 'Policy');

        return Str::kebab($basename);
    }
}
