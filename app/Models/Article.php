<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public function tags(){
        return $this->belongsToMany('App\Models\Tag','tag_article');
    }
    public  function category(){
        return $this->belongsTo(Category::class);
    }

    public  function user(){
        return $this->belongsTo(User::class,'owner_id','id');
    }

    public  function reports(){
        return $this->hasMany(ReportArticle::class);
    }

    public  function messages(){
        return $this->hasMany(Message::class,'id_article','id');
    }
}
