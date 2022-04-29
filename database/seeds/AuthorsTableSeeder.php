<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('authors')->delete();
        
        \DB::table('authors')->insert([
		    [
		        'created_at' => '2020-05-16 22:05:40',
		        'deleted_at' => null,
		        'id' => 1,
		        'name' => 'Unbekannt',
		        'occupation' => null,
		        'published' => 1,
		        'updated_at' => '2020-05-16 22:06:34',
		        'url' => null,
		    ],
		    [
		        'created_at' => '2020-05-16 22:05:40',
		        'deleted_at' => null,
		        'id' => 2,
		        'name' => 'Sybille Seuffer',
		        'occupation' => null,
		        'published' => 1,
		        'updated_at' => '2020-05-16 22:06:34',
		        'url' => null,
		    ],
		    [
		        'created_at' => '2020-05-16 22:07:32',
		        'deleted_at' => null,
		        'id' => 3,
		        'name' => 'Hermann Hesse',
		        'occupation' => 'deutsch-schweizerischer Schriftsteller, Dichter und Maler',
		        'published' => 1,
		        'updated_at' => '2020-05-16 22:07:32',
		        'url' => 'https://de.wikipedia.org/wiki/Hermann_Hesse',
		    ],
		    [
		        'created_at' => '2020-05-16 22:07:54',
		        'deleted_at' => null,
		        'id' => 4,
		        'name' => 'Jean Paul',
		        'occupation' => 'deutscher Schriftsteller',
		        'published' => 1,
		        'updated_at' => '2020-05-16 22:07:54',
		        'url' => 'https://de.wikipedia.org/wiki/Jean_Paul',
		    ],
		    [
		        'created_at' => '2020-05-16 22:08:12',
		        'deleted_at' => null,
		        'id' => 5,
		        'name' => 'Albert Einstein',
		        'occupation' => 'deutsch-US-amerikanischer Physiker',
		        'published' => 1,
		        'updated_at' => '2020-05-16 22:08:12',
		        'url' => 'https://de.wikipedia.org/wiki/Albert_Einstein',
		    ],
		    [
		        'created_at' => '2020-05-16 22:08:24',
		        'deleted_at' => null,
		        'id' => 6,
		        'name' => 'Aristoteles',
		        'occupation' => 'griechischer Philosoph',
		        'published' => 1,
		        'updated_at' => '2020-05-16 22:08:24',
		        'url' => 'https://de.wikipedia.org/wiki/Aristoteles',
		    ],
		    [
		        'created_at' => '2020-05-16 22:08:34',
		        'deleted_at' => null,
		        'id' => 7,
		        'name' => 'Christian August Vulpius',
		        'occupation' => 'deutscher Schriftsteller',
		        'published' => 1,
		        'updated_at' => '2020-05-16 22:08:34',
		        'url' => 'https://de.wikipedia.org/wiki/Christian_August_Vulpius',
		    ],
		    [
		        'created_at' => '2021-01-06 23:49:20',
		        'deleted_at' => null,
		        'id' => 8,
		        'name' => 'Buddha',
		        'occupation' => 'Religionsstifter',
		        'published' => 1,
		        'updated_at' => '2021-01-06 23:49:20',
		        'url' => 'https://de.wikipedia.org/wiki/Buddha#Etymologie',
		    ],
		]);
        
    }
}
