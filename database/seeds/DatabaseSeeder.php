<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $seeders = config('project-seeders');

        foreach ($seeders as $table) {
            $path = Str::of($table)->studly()
                ->prepend(__DIR__.'/raw/')
                ->append('TableSeeder.php')
                ->toString();

            if (file_exists($path) === false) {
                print "\033[33mSkipped:\033[0m $table\n";
                continue;
            }

            $values = require $path;

            $startTime = microtime(true);

            print "\033[32mSeeded:\033[0m $table";

            DB::table($table)->delete();

            DB::table($table)->insert($values);

            $runTime = number_format((microtime(true) - $startTime) * 1000, 2);

            print " (".$runTime."ms, ".count($values)." rows)\n";
        }

        collect(DB::select('SHOW TABLES'))
            ->map(fn ($value) => array_values((array)$value))
            ->flatten()
            ->diff($seeders)
            ->each(fn ($seeder) => print "\033[33mSkipped:\033[0m $seeder\n");
    }
}
