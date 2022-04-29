<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $seeders = config('project-seeders');

        foreach ($seeders as $seeder) {
            $this->call(Str::of($seeder)->studly()->append('TableSeeder')->toString());
        }
    }
}
