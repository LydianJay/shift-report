<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->createAdmin('Lloyd Jay', 'Arpilleda', 'Edradan', 0, 'admin123')->create();
        User::factory()->createDefault()->create();
        // User::factory(10)->create();

    }
}
