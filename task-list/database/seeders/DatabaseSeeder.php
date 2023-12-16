<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * php artisan db:seed will create 10 + 20 rows each time
     * use php artisan migrate:refresh --seed to update the db
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory(2)->unverified()->create(); // create user in specific defined condition (e.g., unverified email)
        \App\Models\Task::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
