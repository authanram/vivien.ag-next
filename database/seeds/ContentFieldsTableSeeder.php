<?php

use Illuminate\Database\Seeder;

class ContentFieldsTableSeeder extends Seeder
{
    /** @noinspection ClassConstantCanBeUsedInspection */
    public function run(): void
    {

        DB::table('content_fields')->delete();

        DB::table('content_fields')->insert([
            [
                'id' => 1,
                'slug' => 'Field 1',
                'type' => 'Laravel\Nova\Fields\Trix',
                'created_at' => '2020-05-14 17:48:08',
                'updated_at' => '2020-05-16 20:32:53',
            ],
            [
                'id' => 2,
                'slug' => 'Field 2',
                'type' => 'Laravel\Nova\Fields\Text',
                'created_at' => '2020-05-14 17:48:08',
                'updated_at' => '2020-05-16 20:32:53',
            ],
        ]);

    }
}
