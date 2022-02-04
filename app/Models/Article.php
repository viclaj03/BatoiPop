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
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
}
