<?php

use Illuminate\Database\Seeder;

class ContentBlocksTableSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('content_blocks')->delete();

        DB::table('content_blocks')->insert([
            [
                'id' => 1,
                'slug' => 'block1',
                'body' => 'i\'m block 1 %year%',
                'created_at' => '2020-05-14 17:48:08',
                'updated_at' => '2020-05-16 20:32:53',
            ],
            [
                'id' => 2,
                'slug' => 'block2',
                'body' => 'i\'m block 2',
                'created_at' => '2020-05-14 17:48:08',
                'updated_at' => '2020-05-16 20:32:53',
            ],
            [
                'id' => 3,
                'slug' => 'block3',
                'body' => 'i\'m block 3',
                'created_at' => '2020-05-14 17:48:08',
                'updated_at' => '2020-05-16 20:32:53',
            ],
        ]);

    }
}
