<?php

use Illuminate\Database\Seeder;

class AttachmentsTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('attachments')->delete();
        
        
    }
}
