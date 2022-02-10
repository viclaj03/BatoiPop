<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public  function user(){
        return  $this->belongsTo(User::class,'id_transmitter');
    }

    public  function article(){
        return  $this->belongsTo('App\Models\Article','id_article','id');
    }

    public  function reports(){
        return $this->hasMany(ReportMessage::class);
    }


}
