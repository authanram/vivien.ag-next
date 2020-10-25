<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('authors')->delete();
        
        \DB::table('authors')->insert([
		    [
		        'id' => 1,
		        'uuid' => '12a63699-4ec7-4560-91d5-36ee7b8956b4',
		        'name' => 'Unbekannt',
		        'occupation' => null,
		        'url' => null,
		        'published' => 1,
		        'created_at' => '2020-05-16 22:05:40',
		        'updated_at' => '2020-05-16 22:06:34',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 2,
		        'uuid' => '12a63699-4ec7-4560-91d5-36ee7b8956b4',
		        'name' => 'Sybille Seuffer',
		        'occupation' => null,
		        'url' => null,
		        'published' => 1,
		        'created_at' => '2020-05-16 22:05:40',
		        'updated_at' => '2020-05-16 22:06:34',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 3,
		        'uuid' => '5d7de9e6-ff28-4d83-a46f-98a127ea5b89',
		        'name' => 'Hermann Hesse',
		        'occupation' => 'deutsch-schweizerischer Schriftsteller, Dichter und Maler',
		        'url' => 'https://de.wikipedia.org/wiki/Hermann_Hesse',
		        'published' => 1,
		        'created_at' => '2020-05-16 22:07:32',
		        'updated_at' => '2020-05-16 22:07:32',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 4,
		        'uuid' => 'e6d55e0c-5a7c-4f26-8780-5a38b1bdb2a2',
		        'name' => 'Jean Paul',
		        'occupation' => 'deutscher Schriftsteller',
		        'url' => 'https://de.wikipedia.org/wiki/Jean_Paul',
		        'published' => 1,
		        'created_at' => '2020-05-16 22:07:54',
		        'updated_at' => '2020-05-16 22:07:54',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 5,
		        'uuid' => '561d6866-5280-4940-8aec-59db42ac7631',
		        'name' => 'Albert Einstein',
		        'occupation' => 'deutsch-US-amerikanischer Physiker',
		        'url' => 'https://de.wikipedia.org/wiki/Albert_Einstein',
		        'published' => 1,
		        'created_at' => '2020-05-16 22:08:12',
		        'updated_at' => '2020-05-16 22:08:12',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 6,
		        'uuid' => '3d1658bf-973b-404a-bfe9-e0e16d441b5c',
		        'name' => 'Aristoteles',
		        'occupation' => 'griechischer Philosoph',
		        'url' => 'https://de.wikipedia.org/wiki/Aristoteles',
		        'published' => 1,
		        'created_at' => '2020-05-16 22:08:24',
		        'updated_at' => '2020-05-16 22:08:24',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 7,
		        'uuid' => '9b88064c-bd8d-4bab-9aaa-e603c4069ce9',
		        'name' => 'Christian August Vulpius',
		        'occupation' => 'deutscher Schriftsteller',
		        'url' => 'https://de.wikipedia.org/wiki/Christian_August_Vulpius',
		        'published' => 1,
		        'created_at' => '2020-05-16 22:08:34',
		        'updated_at' => '2020-05-16 22:08:34',
		        'deleted_at' => null,
		    ],
		]);
        
    }
}
