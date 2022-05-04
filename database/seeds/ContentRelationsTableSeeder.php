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
                'slug' => 'view-block-1',
            ],
            [
                'id' => 2,
                'content_view_id' => 1,
                'content_block_id' => 2,
                'slug' => 'view-block-2',
            ],
            [
                'id' => 3,
                'content_view_id' => 2,
                'content_block_id' => 2,
                'slug' => 'view-block-2',
            ],
            [
                'id' => 4,
                'content_view_id' => 2,
                'content_block_id' => 1,
                'slug' => 'view-block-1',
            ],
            [
                'id' => 5,
                'content_view_id' => 3,
                'content_block_id' => 3,
                'slug' => 'block3',
            ],
        ]);

        DB::table('route_content_views')->delete();
        DB::table('route_content_views')->insert([
            [
                'id' => 1,
                'route_id' => 4,
                'content_view_id' => 3,
                'section' => 'title',
                'published' => 1,
                'order_column' => 1,
            ],
            [
                'id' => 2,
                'route_id' => 4,
                'content_view_id' => 1,
                'section' => 'body',
                'published' => 1,
                'order_column' => 1,
            ],
            [
                'id' => 3,
                'route_id' => 5,
                'content_view_id' => 2,
                'section' => 'title',
                'published' => 0,
                'order_column' => 1,
            ],
            [
                'id' => 4,
                'route_id' => 6,
                'content_view_id' => 3,
                'section' => 'body',
                'published' => 1,
                'order_column' => 1,
            ],
        ]);

    }
}
