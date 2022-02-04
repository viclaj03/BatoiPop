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
        Employee::factory()->count(9)->create();
        Employee::factory()->count(1)->create(['email'=>'victor@gmail.com','name'=>'victor']);
    }
}
