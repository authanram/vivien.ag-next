<?php

use Illuminate\Database\Seeder;

class RoutesTableSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('routes')->delete();

        DB::table('routes')->insert([
		    [
		        'action' => 'WelcomeController@index',
		        'created_at' => '2020-05-15 03:20:33',
		        'deleted_at' => null,
		        'id' => 1,
		        'path' => '/',
		        'published' => 1,
		        'route' => 'welcome',
		        'title' => 'Herzlich Willkommen',
		        'updated_at' => '2020-05-15 03:20:33',
		    ],
		    [
		        'action' => 'EventsController@index',
		        'created_at' => '2020-05-15 03:23:40',
		        'deleted_at' => null,
		        'id' => 2,
		        'path' => 'seminare/{filter?}/{value?}',
		        'published' => 1,
		        'route' => 'events',
		        'title' => 'Seminare',
		        'updated_at' => '2020-12-27 05:03:01',
		    ],
		    [
		        'action' => 'ContentsController@index',
		        'created_at' => '2020-05-15 03:24:05',
		        'deleted_at' => null,
		        'id' => 3,
		        'path' => 'vortraege',
		        'published' => 1,
		        'route' => 'lectures',
		        'title' => 'Vorträge',
		        'updated_at' => '2020-05-15 03:24:05',
		    ],
		    [
		        'action' => 'ViewController@index',
		        'created_at' => '2020-05-15 03:24:34',
		        'deleted_at' => null,
		        'id' => 4,
		        'path' => 'beratung',
		        'published' => 1,
		        'route' => 'consulting',
		        'title' => 'Beratung',
		        'updated_at' => '2020-05-15 03:24:34',
		    ],
		    [
		        'action' => 'ViewController@index',
		        'created_at' => '2020-05-15 03:25:03',
		        'deleted_at' => null,
		        'id' => 5,
		        'path' => 'lerntraining',
		        'published' => 1,
		        'route' => 'learning',
		        'title' => 'Lerntraining',
		        'updated_at' => '2020-06-26 03:21:29',
		    ],
		    [
		        'action' => 'ViewController@index',
		        'created_at' => '2020-05-15 03:25:24',
		        'deleted_at' => null,
		        'id' => 6,
		        'path' => 'portrait',
		        'published' => 1,
		        'route' => 'portrait',
		        'title' => 'Portrait',
		        'updated_at' => '2020-05-15 03:25:24',
		    ],
		    [
		        'action' => 'BlogController@index',
		        'created_at' => '2020-05-15 03:25:36',
		        'deleted_at' => null,
		        'id' => 7,
		        'path' => 'blog/{slug?}/{tag?}',
		        'published' => 1,
		        'route' => 'blog',
		        'title' => 'Blog',
		        'updated_at' => '2020-06-29 05:29:30',
		    ],
		    [
		        'action' => 'BooksController@index',
		        'created_at' => '2020-05-15 03:25:55',
		        'deleted_at' => null,
		        'id' => 8,
		        'path' => 'buchtipps',
		        'published' => 0,
		        'route' => 'books',
		        'title' => 'Buchtipps',
		        'updated_at' => '2020-06-28 01:37:55',
		    ],
		    [
		        'action' => 'ContactController@index',
		        'created_at' => '2020-05-15 03:26:40',
		        'deleted_at' => null,
		        'id' => 9,
		        'path' => 'kontakt',
		        'published' => 1,
		        'route' => 'contact',
		        'title' => 'Kontakt',
		        'updated_at' => '2020-05-15 03:26:40',
		    ],
		    [
		        'action' => 'ContentsController@index',
		        'created_at' => '2020-05-20 21:38:09',
		        'deleted_at' => null,
		        'id' => 10,
		        'path' => 'impressum',
		        'published' => 1,
		        'route' => 'imprint',
		        'title' => 'Impressum',
		        'updated_at' => '2020-05-20 21:38:09',
		    ],
		    [
		        'action' => 'ContentsController@index',
		        'created_at' => '2020-05-20 21:38:48',
		        'deleted_at' => null,
		        'id' => 11,
		        'path' => 'datenschutzerklaerung',
		        'published' => 1,
		        'route' => 'privacy-policy',
		        'title' => 'Datenschutzerklärung',
		        'updated_at' => '2020-05-20 21:38:48',
		    ],
		    [
		        'action' => 'CookiePolicyController@index',
		        'created_at' => '2020-05-20 21:39:12',
		        'deleted_at' => null,
		        'id' => 12,
		        'path' => 'cookie-vereinbarung',
		        'published' => 1,
		        'route' => 'cookie-policy',
		        'title' => 'Cookie Vereinbarung',
		        'updated_at' => '2020-05-20 21:39:12',
		    ],
		    [
		        'action' => 'GalleryController@index',
		        'created_at' => '2020-06-28 01:39:38',
		        'deleted_at' => null,
		        'id' => 13,
		        'path' => 'galerie',
		        'published' => 0,
		        'route' => 'gallery',
		        'title' => 'Galerie',
		        'updated_at' => '2020-06-28 01:39:38',
		    ],
		    [
		        'action' => 'ContentsController@index',
		        'created_at' => '2020-12-09 20:50:58',
		        'deleted_at' => '2020-12-27 05:17:35',
		        'id' => 14,
		        'path' => 'seminare',
		        'published' => 0,
		        'route' => 'events-static',
		        'title' => 'Seminare (Offline)',
		        'updated_at' => '2020-12-27 05:17:35',
		    ],
		]);

    }
}
