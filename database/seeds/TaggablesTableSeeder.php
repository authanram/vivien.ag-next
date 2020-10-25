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
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 1,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 1,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 1,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 1,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 2,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 2,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 2,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 2,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 3,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 3,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 3,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 3,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 4,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 4,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 4,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 4,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 5,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 5,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 5,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 5,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 6,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 6,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 6,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 6,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 7,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 7,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 7,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 7,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 8,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 8,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 8,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 8,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 9,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 9,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 9,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 9,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 10,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 10,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 10,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 10,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 11,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 11,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 11,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 11,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 12,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 12,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 12,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 12,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 13,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 13,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 13,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 13,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 14,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 14,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 14,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 14,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 15,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 15,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 15,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 15,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 16,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 16,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 16,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 16,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 17,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 17,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 17,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 17,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 18,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 18,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 18,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 18,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 19,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 19,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 19,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 19,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 20,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 20,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 20,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 20,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 21,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 21,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 21,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 21,
		    ],
		    [
		        'tag_id' => 6,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 22,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 22,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 22,
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 23,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 23,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 23,
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 23,
		    ],
		    [
		        'tag_id' => 15,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 23,
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 24,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 24,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 24,
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 24,
		    ],
		    [
		        'tag_id' => 15,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 24,
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 25,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 25,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 25,
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 25,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 25,
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 26,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 26,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 26,
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 26,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 26,
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 27,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 27,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 27,
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 27,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 27,
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 28,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 28,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 28,
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 28,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 28,
		    ],
		    [
		        'tag_id' => 2,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 29,
		    ],
		    [
		        'tag_id' => 6,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 29,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 29,
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 29,
		    ],
		    [
		        'tag_id' => 2,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 30,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 30,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 30,
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 30,
		    ],
		    [
		        'tag_id' => 2,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 31,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 31,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 31,
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 31,
		    ],
		    [
		        'tag_id' => 2,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 32,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 32,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 32,
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 32,
		    ],
		    [
		        'tag_id' => 2,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 33,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 33,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 33,
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 33,
		    ],
		    [
		        'tag_id' => 2,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 34,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 34,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 34,
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 34,
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 35,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 35,
		    ],
		    [
		        'tag_id' => 8,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 35,
		    ],
		    [
		        'tag_id' => 10,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 35,
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 36,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 36,
		    ],
		    [
		        'tag_id' => 8,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 36,
		    ],
		    [
		        'tag_id' => 10,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 36,
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 37,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 37,
		    ],
		    [
		        'tag_id' => 8,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 37,
		    ],
		    [
		        'tag_id' => 10,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 37,
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 38,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 38,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 38,
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 39,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 39,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 39,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 40,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 40,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 41,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 41,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 42,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 42,
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 42,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 43,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 43,
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 43,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 44,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 44,
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 44,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 45,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 45,
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 45,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 46,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 46,
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 46,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 47,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 47,
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 47,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 48,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 48,
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 48,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 49,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 49,
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 49,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 50,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 50,
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 50,
		    ],
		    [
		        'tag_id' => 29,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 51,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 52,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 52,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 52,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 52,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 53,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 53,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 53,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 53,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 54,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 54,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 54,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 54,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 55,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 55,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 55,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 55,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 56,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 56,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 56,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 56,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 57,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 57,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 57,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 57,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 58,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 58,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 58,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 58,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 59,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 59,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 59,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 59,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 60,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 60,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 60,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 60,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 61,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 61,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 61,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 61,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 62,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 62,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 62,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 62,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 63,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 63,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 63,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 63,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 64,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 64,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 64,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 64,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 65,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 65,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 65,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 65,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 66,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 66,
		    ],
		    [
		        'tag_id' => 14,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 66,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 66,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 67,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 67,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 67,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 67,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 68,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 68,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 68,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 68,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 69,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 69,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 69,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 69,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 70,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 70,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 70,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 70,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 71,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 71,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 71,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 71,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 72,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 72,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 72,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 72,
		    ],
		    [
		        'tag_id' => 6,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 73,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 73,
		    ],
		    [
		        'tag_id' => 18,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 73,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 74,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 74,
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 74,
		    ],
		    [
		        'tag_id' => 15,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 74,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 75,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 75,
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 75,
		    ],
		    [
		        'tag_id' => 15,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 75,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 76,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 76,
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 76,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 76,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 77,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 77,
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 77,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 77,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 78,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 78,
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 78,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 78,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 79,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 79,
		    ],
		    [
		        'tag_id' => 12,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 79,
		    ],
		    [
		        'tag_id' => 13,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 79,
		    ],
		    [
		        'tag_id' => 6,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 80,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 80,
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 80,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 81,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 81,
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 81,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 82,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 82,
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 82,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 83,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 83,
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 83,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 84,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 84,
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 84,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 85,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 85,
		    ],
		    [
		        'tag_id' => 16,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 85,
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 86,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 86,
		    ],
		    [
		        'tag_id' => 8,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 86,
		    ],
		    [
		        'tag_id' => 10,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 86,
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 87,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 87,
		    ],
		    [
		        'tag_id' => 8,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 87,
		    ],
		    [
		        'tag_id' => 10,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 87,
		    ],
		    [
		        'tag_id' => 1,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 88,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 88,
		    ],
		    [
		        'tag_id' => 8,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 88,
		    ],
		    [
		        'tag_id' => 10,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 88,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 89,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 89,
		    ],
		    [
		        'tag_id' => 5,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 90,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 90,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 91,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 91,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 92,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 92,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 93,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 93,
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 93,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 94,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 94,
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 94,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 95,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 95,
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 95,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 96,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 96,
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 96,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 97,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 97,
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 97,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 98,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 98,
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 98,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 99,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 99,
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 99,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 100,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 100,
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 100,
		    ],
		    [
		        'tag_id' => 4,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 101,
		    ],
		    [
		        'tag_id' => 9,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 101,
		    ],
		    [
		        'tag_id' => 19,
		        'taggable_type' => 'App\\Models\\Event',
		        'taggable_id' => 101,
		    ],
		    [
		        'tag_id' => 22,
		        'taggable_type' => 'App\\Models\\Post',
		        'taggable_id' => 6,
		    ],
		    [
		        'tag_id' => 27,
		        'taggable_type' => 'App\\Models\\Post',
		        'taggable_id' => 6,
		    ],
		    [
		        'tag_id' => 28,
		        'taggable_type' => 'App\\Models\\Post',
		        'taggable_id' => 6,
		    ],
		    [
		        'tag_id' => 30,
		        'taggable_type' => 'App\\Models\\Post',
		        'taggable_id' => 7,
		    ],
		]);
        
    }
}
