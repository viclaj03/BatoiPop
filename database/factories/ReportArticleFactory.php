<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article_id'=>Article::inRandomOrder()->first(),
            'description'=>$this->faker->text(100),
            'user_id'=>User::inRandomOrder()->first()
        ];
    }
}
