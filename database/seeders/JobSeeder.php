<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Wirat Sakorn',
            'email' => 'wiratatwork@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $jobs = [
            ['title' => 'Laravel Developer', 'description' => 'Expert in Laravel framework'],
            ['title' => 'Frontend Engineer', 'description' => 'Expert in React and Tailwind'],
            ['title' => 'UI/UX Designer', 'description' => 'Expert in Figma'],
            ['title' => 'Product Manager', 'description' => 'Expert in Agile'],
        ];

        foreach ($jobs as $jobData) {
            Job::create(array_merge($jobData, ['user_id' => $user->id]));
        }
    }
}
