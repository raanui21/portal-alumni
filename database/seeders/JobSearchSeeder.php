<?php

namespace Database\Seeders;

use App\Models\JobSearch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSearchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobSearch::factory()->count(10)->create();
    }
}
