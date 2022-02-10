<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'owner_id'=>User::inRandomOrder()->first(),
            'category_id'=>Category::inRandomOrder()->first(),
            'name'=>$this->faker->name(),
            'description'=>$this->faker->text(100),
            'price'=>$this->faker->randomFloat(2,1,2000),
            'location'=>$this->faker->locale()
        ];
    }
}
