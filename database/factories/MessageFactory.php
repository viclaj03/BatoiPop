<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_transmitter'=>User::inRandomOrder()->first(),
            'id_article'=> Article::inRandomOrder()->first(),
            'message'=>$this->faker->text(100),
        ];
    }
}
