<?php

use Illuminate\Database\Seeder;

class ContentRelationsTableSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('content_block_fields')->delete();
        DB::table('content_block_fields')->insert([
            [
                'id' => 1,
                'content_block_id' => 1,
                'content_field_id' => 1,
            ],
            [
                'id' => 2,
                'content_block_id' => 1,
                'content_field_id' => 2,
            ],
            [
                'id' => 3,
                'content_block_id' => 2,
                'content_field_id' => 2,
            ],
            [
                'id' => 4,
                'content_block_id' => 2,
                'content_field_id' => 1,
            ],
        ]);

        DB::table('content_view_blocks')->delete();
        DB::table('content_view_blocks')->insert([
            [
                'id' => 1,
                'content_view_id' => 1,
                'content_block_id' => 1,
            ],
            [
                'id' => 2,
                'content_view_id' => 1,
                'content_block_id' => 2,
            ],
            [
                'id' => 3,
                'content_view_id' => 2,
                'content_block_id' => 2,
            ],
            [
                'id' => 4,
                'content_view_id' => 2,
                'content_block_id' => 1,
            ],
            [
                'id' => 5,
                'content_view_id' => 2,
                'content_block_id' => 2,
            ],
        ]);

    }
}
