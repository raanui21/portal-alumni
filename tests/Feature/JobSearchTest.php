<?php

namespace Tests\Feature;

use Database\Seeders\JobSearchSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JobSearchTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_all_jobs()
    {
        $this->seed([JobSearchSeeder::class]);

        $this->get('/api/jobs')->assertStatus(200);
    }
}
