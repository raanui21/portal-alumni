<?php

namespace Tests\Feature;

use App\Models\Article;
use Database\Seeders\ArticleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{

    public function test_get_all_articles()
    {
        $this->seed([ArticleSeeder::class]);

        $this->get('/api/articles')->assertStatus(200);
    }
}
