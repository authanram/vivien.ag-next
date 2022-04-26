<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeSeeders extends Command
{
    protected $signature = 'vivien:make:seeders';

    protected $description = 'Create table seeders';

    public function handle(): int
    {
        $this->line('');
        $this->line('Making Seeders...');
        $this->line('');

        \Artisan::call('seed', [
            'tables'  => implode(',', [
                'authors',
                'colors',
                'contents',
                'events',
                'event_locations',
                'event_types',
                'image_coords',
                'images',
                'menu_items',
                'menus',
                'posts',
                'quotes',
                'route_content',
                'routes',
                'static_attributes',
                'taggables',
                'tags',
                'permissions',
                'roles',
                'model_has_permissions',
                'model_has_roles',
                'role_has_permissions',
            ]),
            '--force' => true,
        ]);

        $this->info(\Artisan::output());

        return 0;
    }
}
