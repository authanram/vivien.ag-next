<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Model::preventLazyLoading(false);

        User::factory(['name' => 'Test Super Admin', 'email' => 'dev@vivien.ag'])
            ->create();

        $this->call(EventsSeeder::class);
    }
}
