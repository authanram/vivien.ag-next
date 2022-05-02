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
                'content_layout_id' => 1,
                'slug' => 'slot1',
                'created_at' => '2020-05-14 17:48:08',
                'updated_at' => '2020-05-16 20:32:53',
            ],
            [
                'id' => 2,
                'content_layout_id' => 2,
                'slug' => 'slot1',
                'created_at' => '2020-05-14 17:48:08',
                'updated_at' => '2020-05-16 20:32:53',
            ],
            [
                'id' => 3,
                'content_layout_id' => 2,
                'slug' => 'slot2',
                'created_at' => '2020-05-14 17:48:08',
                'updated_at' => '2020-05-16 20:32:53',
            ],
        ]);

    }
}
