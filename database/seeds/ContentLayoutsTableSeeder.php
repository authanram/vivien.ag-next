<?php

use Illuminate\Database\Seeder;

class ContentLayoutsTableSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('content_layouts')->delete();

        DB::table('content_layouts')->insert([
            [
                'id' => 1,
                'slug' => 'Layout 1',
                'value' => '<div>%slot1%</div>',
                'created_at' => '2020-05-14 17:48:08',
                'updated_at' => '2020-05-16 20:32:53',
            ],
            [
                'id' => 2,
                'slug' => 'Layout 2',
                'value' => '<div>%slot1%</div><div>%slot2%</div>',
                'created_at' => '2020-05-14 17:48:08',
                'updated_at' => '2020-05-16 20:32:53',
            ],
        ]);

    }
}
