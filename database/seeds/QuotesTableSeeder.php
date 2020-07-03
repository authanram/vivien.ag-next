<?php

use Illuminate\Database\Seeder;

class QuotesTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('quotes')->delete();
        
        \DB::table('quotes')->insert([
		    [
		        'author_id' => 1,
		        'body' => 'Liebe das Leben %s und es wird dich ebenso lieben.',
		        'created_at' => '2020-05-14 17:48:08',
		        'deleted_at' => null,
		        'id' => 1,
		        'published' => 1,
		        'updated_at' => '2020-05-16 20:32:53',
		        'uuid' => 'a99ff91a-3569-4437-8cdc-2d995db098db',
		    ],
		    [
		        'author_id' => 2,
		        'body' => 'Die Ruhe selbst sein.',
		        'created_at' => '2020-05-14 17:54:46',
		        'deleted_at' => null,
		        'id' => 2,
		        'published' => 1,
		        'updated_at' => '2020-05-17 00:48:48',
		        'uuid' => 'a60aebc5-810d-4249-80a8-b0346aaeb057',
		    ],
		    [
		        'author_id' => 3,
		        'body' => 'Wer nicht in die Welt passt, %s der ist immer nahe daran, sich selber zu finden.',
		        'created_at' => '2020-05-14 17:58:41',
		        'deleted_at' => null,
		        'id' => 3,
		        'published' => 1,
		        'updated_at' => '2020-05-17 00:48:55',
		        'uuid' => 'fcc0ca0c-b0d7-4ea7-a322-1c8dc4fca3f3',
		    ],
		    [
		        'author_id' => 4,
		        'body' => 'Um zur Wahrheit zu gelangen, %s sollte jeder die Meinung seines Gegners zu verteidigen versuchen.',
		        'created_at' => '2020-05-14 22:17:27',
		        'deleted_at' => null,
		        'id' => 4,
		        'published' => 1,
		        'updated_at' => '2020-05-17 00:49:04',
		        'uuid' => '6aa9ef7d-28e2-4e62-ae33-8658684d7f1a',
		    ],
		    [
		        'author_id' => 5,
		        'body' => 'Es gibt viele Wege zum Glück. %s Einer davon ist aufhören zu jammern.',
		        'created_at' => '2020-05-16 20:34:32',
		        'deleted_at' => null,
		        'id' => 5,
		        'published' => 1,
		        'updated_at' => '2020-05-17 00:49:09',
		        'uuid' => '2805830b-9830-44ee-9c3f-f195e0515156',
		    ],
		    [
		        'author_id' => 6,
		        'body' => 'Der Anfang %s ist die Hälfte des Ganzen.',
		        'created_at' => '2020-05-16 21:07:50',
		        'deleted_at' => null,
		        'id' => 6,
		        'published' => 1,
		        'updated_at' => '2020-05-17 00:49:20',
		        'uuid' => '0ca4ee82-ac31-4124-9e49-84c0a1c7a7a3',
		    ],
		    [
		        'author_id' => 7,
		        'body' => 'Fürchte dich nicht, langsam zu gehen. %s Fürchte dich, stehen zu bleiben.',
		        'created_at' => '2020-05-16 21:10:41',
		        'deleted_at' => null,
		        'id' => 7,
		        'published' => 1,
		        'updated_at' => '2020-05-17 00:49:26',
		        'uuid' => 'e30d6a09-2f48-4ef6-90b1-8ca0b7581bfe',
		    ],
		    [
		        'author_id' => 2,
		        'body' => 'Vielleicht wird alles viel leichter.',
		        'created_at' => '2020-06-28 22:28:36',
		        'deleted_at' => null,
		        'id' => 8,
		        'published' => 1,
		        'updated_at' => '2020-06-29 07:17:02',
		        'uuid' => 'dedad585-afd8-4707-8ea0-6c05231b74a7',
		    ],
		]);
        
    }
}
