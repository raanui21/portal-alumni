<?php

namespace Database\Seeders;

use App\Models\Survey;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users except the test user
        $users = User::where('email', '!=', '3337210999@ugm.ac.id')->get();

        // Generate surveys for each user
        foreach ($users as $user) {
            Survey::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
