<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportMessage extends Model
{
    use HasFactory;

    public  function Message(){
        return $this->belongsTo(Message::class);
    }

   /*public function user(){
        $this->belongsTo(User::class,Message::class,'id_transmitter','message_id','id');
    }*/

    public function getNameUserAttribute(){
        return $this->message->userTransmitter->name;
    }
}


