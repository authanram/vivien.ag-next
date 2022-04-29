<?php

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('menu_items')->delete();
        
        \DB::table('menu_items')->insert([
		    [
		        'color_id' => 1,
		        'created_at' => '2020-05-20 21:33:17',
		        'dropdown_breakpoint' => 'md',
		        'id' => 1,
		        'label' => 'Startseite',
		        'menu_id' => 1,
		        'order_column' => 1,
		        'published' => 1,
		        'route_id' => 1,
		        'updated_at' => '2020-05-21 00:08:14',
		    ],
		    [
		        'color_id' => 2,
		        'created_at' => '2020-05-20 21:33:17',
		        'dropdown_breakpoint' => 'md',
		        'id' => 2,
		        'label' => 'Seminare',
		        'menu_id' => 1,
		        'order_column' => 2,
		        'published' => 1,
		        'route_id' => 2,
		        'updated_at' => '2020-12-27 05:18:08',
		    ],
		    [
		        'color_id' => 3,
		        'created_at' => '2020-05-20 21:33:17',
		        'dropdown_breakpoint' => 'md',
		        'id' => 3,
		        'label' => 'Vorträge',
		        'menu_id' => 1,
		        'order_column' => 3,
		        'published' => 1,
		        'route_id' => 3,
		        'updated_at' => '2020-05-21 00:08:14',
		    ],
		    [
		        'color_id' => 4,
		        'created_at' => '2020-05-20 21:33:17',
		        'dropdown_breakpoint' => 'md',
		        'id' => 4,
		        'label' => 'Beratung',
		        'menu_id' => 1,
		        'order_column' => 4,
		        'published' => 1,
		        'route_id' => 4,
		        'updated_at' => '2020-05-21 00:08:14',
		    ],
		    [
		        'color_id' => 5,
		        'created_at' => '2020-05-20 21:33:17',
		        'dropdown_breakpoint' => 'md',
		        'id' => 5,
		        'label' => 'Lerntraining',
		        'menu_id' => 1,
		        'order_column' => 5,
		        'published' => 1,
		        'route_id' => 5,
		        'updated_at' => '2020-05-21 00:08:14',
		    ],
		    [
		        'color_id' => 6,
		        'created_at' => '2020-05-20 21:33:17',
		        'dropdown_breakpoint' => 'md',
		        'id' => 6,
		        'label' => 'Portrait',
		        'menu_id' => 1,
		        'order_column' => 6,
		        'published' => 1,
		        'route_id' => 6,
		        'updated_at' => '2020-05-21 00:08:14',
		    ],
		    [
		        'color_id' => 7,
		        'created_at' => '2020-05-20 21:33:17',
		        'dropdown_breakpoint' => 'xl',
		        'id' => 7,
		        'label' => 'Blog',
		        'menu_id' => 1,
		        'order_column' => 7,
		        'published' => 1,
		        'route_id' => 7,
		        'updated_at' => '2020-07-03 18:14:03',
		    ],
		    [
		        'color_id' => 8,
		        'created_at' => '2020-05-20 21:33:17',
		        'dropdown_breakpoint' => 'xl',
		        'id' => 8,
		        'label' => 'Buchtipps',
		        'menu_id' => 1,
		        'order_column' => 8,
		        'published' => 0,
		        'route_id' => 8,
		        'updated_at' => '2020-06-28 01:35:52',
		    ],
		    [
		        'color_id' => 9,
		        'created_at' => '2020-05-20 21:33:17',
		        'dropdown_breakpoint' => 'xl',
		        'id' => 9,
		        'label' => 'Kontakt',
		        'menu_id' => 1,
		        'order_column' => 9,
		        'published' => 1,
		        'route_id' => 9,
		        'updated_at' => '2020-05-21 00:08:14',
		    ],
		    [
		        'color_id' => 9,
		        'created_at' => '2020-05-20 21:33:17',
		        'dropdown_breakpoint' => null,
		        'id' => 10,
		        'label' => 'Kontakt',
		        'menu_id' => 2,
		        'order_column' => 1,
		        'published' => 1,
		        'route_id' => 9,
		        'updated_at' => '2020-05-21 00:08:14',
		    ],
		    [
		        'color_id' => 9,
		        'created_at' => '2020-05-20 21:40:19',
		        'dropdown_breakpoint' => null,
		        'id' => 11,
		        'label' => 'Impressum',
		        'menu_id' => 2,
		        'order_column' => 2,
		        'published' => 1,
		        'route_id' => 10,
		        'updated_at' => '2020-05-21 00:08:24',
		    ],
		    [
		        'color_id' => 9,
		        'created_at' => '2020-05-20 21:40:47',
		        'dropdown_breakpoint' => 'sm',
		        'id' => 12,
		        'label' => 'Datenschutzerklärung',
		        'menu_id' => 2,
		        'order_column' => 3,
		        'published' => 1,
		        'route_id' => 11,
		        'updated_at' => '2020-05-21 00:34:08',
		    ],
		    [
		        'color_id' => 9,
		        'created_at' => '2020-05-20 21:41:05',
		        'dropdown_breakpoint' => 'sm',
		        'id' => 13,
		        'label' => 'Cookie Vereinbarung',
		        'menu_id' => 2,
		        'order_column' => 4,
		        'published' => 1,
		        'route_id' => 12,
		        'updated_at' => '2020-05-21 02:02:23',
		    ],
		    [
		        'color_id' => 5,
		        'created_at' => '2020-06-28 01:40:52',
		        'dropdown_breakpoint' => 'xl',
		        'id' => 14,
		        'label' => 'Galerie',
		        'menu_id' => 1,
		        'order_column' => 10,
		        'published' => 0,
		        'route_id' => 13,
		        'updated_at' => '2020-06-28 01:40:52',
		    ],
		]);
        
    }
}
