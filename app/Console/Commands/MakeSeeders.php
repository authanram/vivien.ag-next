<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeSeeders extends Command
{
    protected $signature = 'vivien:make:seeders';

    protected $description = 'Create table seeders';

    final public function handle(): int
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
                'parsedown_codes',
                'posts',
                'quotes',
                'route_content',
                'routes',
                'static_attributes',
                'taggables',
                'tags'
            ]),
            '--force' => true,
        ]);

        $this->info(\Artisan::output());

        return 0;
    }
}
