<?php

namespace Database\Seeders;

use App\Models\Survey;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed users
        $this->call(UserSeeder::class);

        // Seed surveys for each user
        $this->call(SurveySeeder::class);
        
        $this->call(ArticleSeeder::class);

        $this->call(JobSearchSeeder::class);
    }
}
