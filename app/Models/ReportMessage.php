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
        $this->belongsTo(User::class,Message::class,'message_id','id_transmitter');
    }*/

    public function getNameUserAttribute(){
        return $this->message->userTransmitter->name;
    }

    public function reportUser(){
        return $this->belongsTo(User::class,'id_user','id');
    }
}


