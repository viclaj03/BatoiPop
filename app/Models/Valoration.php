<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoration extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'is_user_emissor','id');
    }
}
