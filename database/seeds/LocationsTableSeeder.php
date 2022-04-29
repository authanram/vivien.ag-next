<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('locations')->delete();

        DB::table('locations')->insert([
		    [
		        'address' => 'Geisswiesen 24/1, 72227 Egenhausen',
		        'created_at' => '2020-05-26 04:35:05',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 1,
		        'name' => 'Egenhausen, Geisswiesen 24/1',
		        'updated_at' => '2020-05-26 04:37:17',
		        'url' => 'https://goo.gl/maps/5SYy3qiHmQvRcci4A',
		    ],
		    [
		        'address' => 'Wörnersberger Anker, Hauptstraße 32, 72299 Wörnersberg',
		        'created_at' => '2020-05-26 04:36:53',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 2,
		        'name' => 'Wörnersberger Anker',
		        'updated_at' => '2020-05-26 04:36:53',
		        'url' => 'https://goo.gl/maps/rfXYiwRyqEshUG1f6',
		    ],
		    [
		        'address' => 'Altensteiger Str. 43, 72294 Grömbach',
		        'created_at' => '2020-05-26 04:38:06',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 3,
		        'name' => 'Atelier, Grömbach',
		        'updated_at' => '2020-05-26 04:38:06',
		        'url' => 'https://goo.gl/maps/GQBhEMvpb7sHtHdc7',
		    ],
		    [
		        'address' => null,
		        'created_at' => '2020-05-26 04:41:10',
		        'deleted_at' => null,
		        'description' => 'Im gemütlichen Eigenheim',
		        'id' => 4,
		        'name' => 'At home',
		        'updated_at' => '2020-10-14 03:50:32',
		        'url' => null,
		    ],
		    [
		        'address' => null,
		        'created_at' => '2020-05-26 04:42:43',
		        'deleted_at' => null,
		        'description' => 'Mit dem E-Bike auf Nebenstrecken',
		        'id' => 5,
		        'name' => 'Auf Nebenstrecken',
		        'updated_at' => '2020-10-14 03:50:36',
		        'url' => null,
		    ],
		    [
		        'address' => null,
		        'created_at' => '2020-06-28 22:08:33',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 6,
		        'name' => 'Am Telefon',
		        'updated_at' => '2020-10-14 03:50:26',
		        'url' => null,
		    ],
		    [
		        'address' => null,
		        'created_at' => '2020-10-13 08:30:28',
		        'deleted_at' => null,
		        'description' => 'Reisen mit Frauen! Sei dabei und fühl dich frei!'."\n"
		            .' Du wirst kreativ, erweiterst deinen Horizont, erlebst eine unbeschwerte Zeit, lernst dich selbst besser kennen und spürst, dass dadurch dein Leben reicher wird!',
		        'id' => 7,
		        'name' => 'Oberammergau',
		        'updated_at' => '2020-10-14 03:50:40',
		        'url' => null,
		    ],
		    [
		        'address' => null,
		        'created_at' => '2020-10-14 03:51:24',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 8,
		        'name' => 'Bodensee',
		        'updated_at' => '2020-10-14 03:51:24',
		        'url' => null,
		    ],
		    [
		        'address' => null,
		        'created_at' => '2020-10-14 03:51:42',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 9,
		        'name' => 'Heidelberg',
		        'updated_at' => '2020-10-14 03:55:17',
		        'url' => null,
		    ],
		    [
		        'address' => 'Berlin',
		        'created_at' => '2021-07-02 06:36:16',
		        'deleted_at' => null,
		        'description' => 'Berlin weil es Berlin ist.'."\n"
		            .'Schreiben in der Großstadt '."\n"
		            .'Eine ganz besondere Stadtführung erleben',
		        'id' => 10,
		        'name' => 'Schreibreise',
		        'updated_at' => '2021-07-02 06:36:16',
		        'url' => null,
		    ],
		    [
		        'address' => 'Erzgrube bei Tamara',
		        'created_at' => '2021-07-02 06:50:15',
		        'deleted_at' => null,
		        'description' => 'Alles was Frauen gerne tun!',
		        'id' => 11,
		        'name' => 'Frauenwochenende',
		        'updated_at' => '2021-07-02 06:50:15',
		        'url' => null,
		    ],
		]);

    }
}
