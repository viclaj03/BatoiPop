<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportArticle extends Model
{
    use HasFactory;

    public  function article(){
        return $this->belongsTo(Article::class);
    }

    public function getNameUserAttribute(){
        return $this->article->user->name;
    }

    public function userReport(){
        return $this->belongsTo(User::class,'user_id','id');
    }




}
