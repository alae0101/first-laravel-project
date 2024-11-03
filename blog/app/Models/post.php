<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable =['title','description','created_at','updated_at','user_id',];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
