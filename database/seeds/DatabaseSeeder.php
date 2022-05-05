<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        foreach (config('project-seeders') as $table) {
            DB::table($table)->delete();

            $filename = Str::of($table)->studly()->append('TableSeeder.php')->toString();

            DB::table($table)->insert(require __DIR__.'/raw/'.$filename);
        }
    }
}
