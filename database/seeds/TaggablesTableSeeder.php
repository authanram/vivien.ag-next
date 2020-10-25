<?php

use Illuminate\Database\Seeder;

class TaggablesTableSeeder extends Seeder
{
    public function run()
    {

        \DB::table('taggables')->delete();

        \DB::table('taggables')->insert([
		    [
		        'tag_id' => 4,
		        'taggable_id' => 1,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 1,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 1,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 1,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 2,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 2,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 2,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 2,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 3,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 3,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 3,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 3,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 6,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 6,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 6,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 6,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 7,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 7,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 7,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 7,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 8,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 8,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 8,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 8,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 10,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 10,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 10,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 10,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 11,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 11,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 11,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 11,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 12,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 12,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 12,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 12,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 15,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 15,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 15,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 15,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 16,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 16,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 16,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 16,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 17,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 17,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 17,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 17,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 20,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 20,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 20,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 20,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 21,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 21,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 21,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 21,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 6,
		        'taggable_id' => 22,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 22,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 22,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_id' => 23,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 23,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 23,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_id' => 23,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 15,
		        'taggable_id' => 23,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_id' => 24,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 24,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 24,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_id' => 24,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 15,
		        'taggable_id' => 24,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_id' => 25,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 25,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 25,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_id' => 25,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 25,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_id' => 26,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 26,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 26,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_id' => 26,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 26,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_id' => 27,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 27,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 27,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_id' => 27,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 27,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_id' => 28,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 28,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 28,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_id' => 28,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 28,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 2,
		        'taggable_id' => 29,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 6,
		        'taggable_id' => 29,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 29,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_id' => 29,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 2,
		        'taggable_id' => 30,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 30,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 30,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_id' => 30,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 2,
		        'taggable_id' => 31,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 31,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 31,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_id' => 31,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 2,
		        'taggable_id' => 32,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 32,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 32,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_id' => 32,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 2,
		        'taggable_id' => 33,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 33,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 33,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_id' => 33,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 2,
		        'taggable_id' => 34,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 34,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 34,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_id' => 34,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_id' => 35,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 35,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 8,
		        'taggable_id' => 35,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 10,
		        'taggable_id' => 35,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_id' => 36,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 36,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 8,
		        'taggable_id' => 36,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 10,
		        'taggable_id' => 36,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_id' => 37,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 37,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 8,
		        'taggable_id' => 37,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 10,
		        'taggable_id' => 37,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_id' => 38,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 38,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 38,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_id' => 39,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 39,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 39,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 40,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 40,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 41,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 41,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 42,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 42,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_id' => 42,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 43,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 43,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_id' => 43,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 44,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 44,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_id' => 44,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 45,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 45,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_id' => 45,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 46,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 46,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_id' => 46,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 47,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 47,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_id' => 47,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 48,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 48,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_id' => 48,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 49,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 49,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_id' => 49,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 50,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 50,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_id' => 50,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 29,
		        'taggable_id' => 51,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 52,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 52,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 52,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 52,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 53,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 53,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 53,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 53,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 54,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 54,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 54,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 54,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 55,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 55,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 55,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 55,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 56,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 56,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 56,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 56,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 57,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 57,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 57,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 57,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 58,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 58,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 58,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 58,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 59,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 59,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 59,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 59,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 60,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 60,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 60,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 60,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 61,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 61,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 61,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 61,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 62,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 62,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 62,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 62,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 63,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 63,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 63,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 63,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 64,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 64,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 64,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 64,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 65,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 65,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 65,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 65,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 66,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 66,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_id' => 66,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 66,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 67,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 67,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 67,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 67,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 68,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 68,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 68,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 68,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 69,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 69,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 69,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 69,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 70,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 70,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 70,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 70,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 71,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 71,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 71,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 71,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 72,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 72,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 72,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 72,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 6,
		        'taggable_id' => 73,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 73,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_id' => 73,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 74,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 74,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_id' => 74,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 15,
		        'taggable_id' => 74,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 75,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 75,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_id' => 75,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 15,
		        'taggable_id' => 75,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 76,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 76,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_id' => 76,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 76,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 77,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 77,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_id' => 77,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 77,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 78,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 78,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_id' => 78,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 78,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 79,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 79,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_id' => 79,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_id' => 79,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 6,
		        'taggable_id' => 80,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 80,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_id' => 80,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 81,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 81,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_id' => 81,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 82,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 82,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_id' => 82,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 83,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 83,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_id' => 83,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 84,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 84,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_id' => 84,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 85,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 85,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_id' => 85,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_id' => 86,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 86,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 8,
		        'taggable_id' => 86,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 10,
		        'taggable_id' => 86,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_id' => 87,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 87,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 8,
		        'taggable_id' => 87,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 10,
		        'taggable_id' => 87,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_id' => 88,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 88,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 8,
		        'taggable_id' => 88,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 10,
		        'taggable_id' => 88,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 89,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 89,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_id' => 90,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 90,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 91,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 91,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 92,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 92,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 93,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 93,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_id' => 93,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 94,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 94,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_id' => 94,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 95,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 95,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_id' => 95,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 96,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 96,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_id' => 96,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 97,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 97,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_id' => 97,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 98,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 98,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_id' => 98,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 99,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 99,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_id' => 99,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 100,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 100,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_id' => 100,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_id' => 101,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_id' => 101,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_id' => 101,
		        'taggable_type' => 'App\\Models\\Event',
		    ],
		    [
		        'tag_id' => 22,
		        'taggable_id' => 6,
		        'taggable_type' => 'App\\Models\\Post',
		    ],
		    [
		        'tag_id' => 27,
		        'taggable_id' => 6,
		        'taggable_type' => 'App\\Models\\Post',
		    ],
		    [
		        'tag_id' => 28,
		        'taggable_id' => 6,
		        'taggable_type' => 'App\\Models\\Post',
		    ],
		    [
		        'tag_id' => 30,
		        'taggable_id' => 7,
		        'taggable_type' => 'App\\Models\\Post',
		    ],
		]);

    }
}
