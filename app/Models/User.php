<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles(){
        return $this->hasMany(Article::class,'owner_id','id');
    }

    public function messageTransmitter(){
        return $this->hasMany(Message::class,'id_transmitter','id');
    }

    public function messageReport(){
        return $this->hasManyThrough(ReportMessage::class,Message::class,'id_transmitter','message_id',);
    }

    public function articleReport(){
        return $this->hasManyThrough(ReportArticle::class,Article::class,'owner_id','article_id',);
    }

    public function articleReportAccepted(){
        return $this->hasManyThrough(ReportArticle::class,Article::class,'owner_id','article_id')->where('accepted',true);
    }

    public function messageReportAccepted(){
        return $this->hasManyThrough(ReportMessage::class,Message::class,'id_transmitter','message_id')->where('accepted',true);
    }


}
