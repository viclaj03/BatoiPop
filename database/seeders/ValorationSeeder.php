<?php

namespace Database\Seeders;

use App\Models\Valoration;
use Illuminate\Database\Seeder;

class ValorationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Valoration::factory()->count(4)->create();
    }
}
