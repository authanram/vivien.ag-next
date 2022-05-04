<?php

use Illuminate\Database\Seeder;

class ContentRelationsTableSeeder extends Seeder
{
    public function run(): void
    {
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
                'content_view_id' => 3,
                'content_block_id' => 3,
            ],
        ]);

        DB::table('route_content_views')->delete();
        DB::table('route_content_views')->insert([
            [
                'id' => 1,
                'route_id' => 4,
                'content_view_id' => 1,
                'order_column' => 1,
            ],
            [
                'id' => 2,
                'route_id' => 5,
                'content_view_id' => 2,
                'order_column' => 1,
            ],
            [
                'id' => 3,
                'route_id' => 6,
                'content_view_id' => 3,
                'order_column' => 1,
            ],
        ]);

    }
}
