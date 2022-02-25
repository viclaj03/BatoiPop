<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ValorationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'stars'=>$this->faker->numberBetween(1,5),
            'commentary'=>$this->faker->text(100),
            //'id_user_receptor'=>User::inRandomOrder()->first(),
           // 'id_user_emissor'=>User::inRandomOrder()->first(),
        ];
    }
}
