<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobListings = include database_path('seeders/data/job_listings.php');
        $userIds = User::pluck('id')->toArray();

        if (empty($userIds)) {
            $this->command->error('No users found in the database. Please seed users first.');
            return;
        }

        $jobs = [];
        foreach ($jobListings as $listing) {
            $jobs[] = [
                'title' => $listing['title'],
                'description' => $listing['description'],
                'salary' => $listing['salary'],
                'user_id' => $userIds[array_rand($userIds)],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('job_listings')->insert($jobs);
    }
}
