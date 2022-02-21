<?php

namespace Database\Seeders;

use App\Models\User;
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
        $users = User::all();
        $users->each(function ($user){
            Valoration::factory()->count(1)->create(['id_user_receptor'=>$user->id,'id_user_emissor'=>50]);
        });
    }
}
