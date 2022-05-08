<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        foreach (config('project-seeders') as $table) {
            $path = Str::of($table)->studly()
                ->prepend(__DIR__.'/raw/')
                ->append('TableSeeder.php')
                ->toString();

            if (file_exists($path) === false) {
                echo "\033[33mSkipped:\033[0m $table\n";
                continue;
            }

            $values = require $path;

            DB::table($table)->delete();

            DB::table($table)->insert($values);

            print "\033[32mSeeded:\033[0m $table [".count($values)." items]\n";
        }
    }
}
