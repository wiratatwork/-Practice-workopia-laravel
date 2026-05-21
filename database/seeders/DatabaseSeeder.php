<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Truncate tables to prevent duplicate data.
        // Using CASCADE to handle foreign key constraints in PostgreSQL.
        DB::statement('TRUNCATE TABLE job_listings, users CASCADE');

        // Create 10 random users via Factory.
        User::factory(10)->create();

        // Seed job listings from the predefined data file.
        $this->call(JobSeeder::class);
    }
}
