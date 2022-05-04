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
                'body' => '<div class="card flex view">
    <div>%block:view-block-1%</div>
    <div>%block:view-block-2%</div>
</div>',
                'created_at' => '2020-05-14 17:48:08',
                'updated_at' => '2020-05-16 20:32:53',
            ],
            [
                'id' => 2,
                'slug' => 'View 2',
                'body' => '<div>%block:view-block-2%</div>',
                'created_at' => '2020-05-14 17:48:08',
                'updated_at' => '2020-05-16 20:32:53',
            ],
            [
                'id' => 3,
                'slug' => 'View 3',
                'body' => '<div>%block:block3%</div>',
                'created_at' => '2020-05-14 17:48:08',
                'updated_at' => '2020-05-16 20:32:53',
            ],
        ]);

    }
}
