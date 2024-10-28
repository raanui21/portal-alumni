<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;



class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        $img = [
            'https://media.cnn.com/api/v1/images/stellar/prod/210316134738-02-wisdom-project-summer.jpg?q=w_3568,h_2006,x_0,y_0,c_fill',
            'https://i0.wp.com/picjumbo.com/wp-content/uploads/beautiful-winter-mountain-scenery-sunset-with-snow-covered-trees-and-inversion-free-photo.jpg?w=600&quality=80',
            'https://wallpapers.com/images/featured/autumn-background-kyu8tqqpi1mb4g0x.jpg',    
        ];
        
        return [
            'title' => $this->faker->sentence,
            'image_path' => $this->faker->randomElement($img),
            'detail' => $this->faker->paragraph,
            'content' => $this->faker->paragraphs(3, true),
        ];
    }
}
