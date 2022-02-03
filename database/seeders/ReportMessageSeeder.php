<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\ReportMessage;
use Illuminate\Database\Seeder;

class ReportMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = Message::all();
        $messages->each(function ($message){
            ReportMessage::factory()->count(1)->create(['message_id'=>$message->id]);
        });

    }
}
