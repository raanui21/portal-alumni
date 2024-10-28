<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ArticleSeeder extends Seeder
{
    public function run()
    {
        Article::factory()->count(10)->create();
    }
}
