<?php

use Illuminate\Database\Seeder;

class AttendeesTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('attendees')->delete();
        
        
    }
}
