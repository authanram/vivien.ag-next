<?php

use Illuminate\Database\Seeder;

class ContentViewsTableSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('content_views')->delete();

        DB::table('content_views')->insert([
            [
                'id' => 1,
                'slug' => 'View 1',
                'created_at' => '2020-05-14 17:48:08',
                'updated_at' => '2020-05-16 20:32:53',
            ],
            [
                'id' => 2,
                'slug' => 'View 2',
                'created_at' => '2020-05-14 17:48:08',
                'updated_at' => '2020-05-16 20:32:53',
            ],
        ]);

    }
}
