<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public  function userTransmitter(){
        return  $this->belongsTo(User::class,'id_transmitter');
    }

    public  function userReciver(){
        return  $this->belongsTo(User::class,'id_receiver');
    }

    public  function article(){
        return  $this->belongsTo(Article::class,'id_article','id');
    }

    public  function reports(){
        return $this->hasMany(ReportMessage::class);
    }




}
