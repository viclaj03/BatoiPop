<?php

namespace App\Models;

use App\Http\Resources\MessageResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public function tags(){
        return $this->belongsToMany('App\Models\Tag','tag_article');
    }
    public  function category(){
        return $this->belongsTo(Category::class,);
    }

    public  function user(){
        return $this->belongsTo(User::class,'owner_id','id');
    }

    public  function reports(){
        return $this->hasMany(ReportArticle::class);
    }


    public  function messages()
    {
        return $this->hasMany(Message::class, 'id_article', 'id');
    }

    public  function photos(){
        return $this->hasMany(Photo::class,'id_article','id');
    }


    public  function buyer(){
        return $this->belongsTo(User::class,'buyer_id','id');
    }

    public  function scopeName( $query, $name)
    {
        if ($name) {
            return $query->where('name', 'like', '%' . $name . '%');
        }
    }


        public function Tagger(){
            return $this->belongsToMany(Tag::class, 'tag_article');
        }

}
