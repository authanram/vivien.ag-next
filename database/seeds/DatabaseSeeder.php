<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        foreach (config('project-seeders') as $table) {
            $filename = Str::of($table)->studly()->append('TableSeeder.php')->toString();

            $values = require __DIR__.'/raw/'.$filename;

            print "Seeding: $table [".count($values)." items]\n";

            DB::table($table)->delete();

            DB::table($table)->insert($values);
        }
    }
}
