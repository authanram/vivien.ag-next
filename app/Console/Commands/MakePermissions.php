<?php

namespace App\Console\Commands;

use Exception;
use File;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use SplFileInfo;

class MakePermissions extends Command
{
    protected $signature = 'vivien:make:permissions';

    protected $description = 'Create or update permissions based on existing models';

    /**
     * @return int
     * @throws Exception
     */
    public function handle(): int
    {
        $this->newLine();

        $permissions = collect([
            'impersonate',
        ]);

        static::makePermissionSlugs()->each(function (string $slug) use ($permissions) {

            static::getPermissionTypes()->each(function (string $type) use ($slug, $permissions) {

                $permissions->add("$type:$slug");

            });

        });

        $permissions->each(function (string $permission) {

            /** @noinspection PhpUndefinedMethodInspection */
            Permission::updateOrCreate(['name' => $permission, 'guard_name' => 'web']);

            $this->info($permission);

        });

        $this->newLine();

        $this->info($permissions->count().' permissions created (or updated)');

        $this->newLine();

        return 0;
    }

    private static function getPermissionTypes(): Collection
    {
        return collect([
            'novaBrowse',
            'create',
            'viewAny',
            'view',
            'update',
            'delete',
            'forceDelete',
            'restore',
        ]);
    }

    private static function makePermissionSlugs(): Collection
    {
        return collect(File::files(app_path('Models')))
            ->map(static function (SplFileInfo $fileInfo) {
                return Str::of($fileInfo->getFilename())
                    ->before('.php')
                    ->kebab();
            });
    }
}
