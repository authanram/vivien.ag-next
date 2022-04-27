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
		        'uuid' => '12a63699-4ec7-4560-91d5-36ee7b8956b4',
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
		        'uuid' => '12a63699-4ec7-4560-91d5-36ee7b8956b4',
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
		        'uuid' => '5d7de9e6-ff28-4d83-a46f-98a127ea5b89',
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
		        'uuid' => 'e6d55e0c-5a7c-4f26-8780-5a38b1bdb2a2',
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
		        'uuid' => '561d6866-5280-4940-8aec-59db42ac7631',
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
		        'uuid' => '3d1658bf-973b-404a-bfe9-e0e16d441b5c',
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
		        'uuid' => '9b88064c-bd8d-4bab-9aaa-e603c4069ce9',
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
		        'uuid' => 'd8e1c5b1-5778-4afe-b2ee-d2b9b943d6d9',
		    ],
		]);
        
    }
}
