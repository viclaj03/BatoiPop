<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::factory()->count(5)->create();
        Employee::factory()->count(1)->create(['email'=>'victormlajara03@gmail.com','name'=>'victor']);
        Employee::factory()->count(1)->create(['email'=>'jorgecosty8@gmail.com','name'=>'Jorge VIII']);
        Employee::factory()->count(1)->create(['email'=>'andresbeneitoh@gmail.com','name'=>'Andres']);
        Employee::factory()->count(1)->create(['email'=>'josemullormurcia1998@gmail.com','name'=>'Jose']);
    }
}
