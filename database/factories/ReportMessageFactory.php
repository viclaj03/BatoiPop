<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'message_id'=>Message::inRandomOrder()->first(),
           'description'=>$this->faker->text(100),
            'id_user'=> '50',
        ];
    }
}
