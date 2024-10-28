<?php

namespace Database\Factories;

use App\Models\JobSearch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobSearch>
 */
class JobSearchFactory extends Factory
{
    protected $model = JobSearch::class;

    public function definition()
    {
        $logos = [
            'https://upload.wikimedia.org/wikipedia/commons/e/e8/Tesla_logo.png',
            'https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg',
            'https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg',
            'https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg',
            'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg',
        ];

        return [
            'title' => $this->faker->sentence,
            'image_path' => $this->faker->randomElement($logos),
            'description' => $this->faker->paragraphs(1, true),
            'content' => $this->faker->paragraphs(3, true),
            
        ];
    }
}
