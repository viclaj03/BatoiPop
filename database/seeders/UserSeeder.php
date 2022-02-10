<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(49)->create();
        User::factory()->count(1)->create(['email'=>'jorgecosty8@gmail.com','name'=>'jorge']);
    }
}
