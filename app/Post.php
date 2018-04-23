<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','body'];

    public function comments(){
        return $this->hasMany(Comment::class,'post_id','id');
    }

    public function user(){
        //$this->hasOne('App\User');
        return $this->hasOne(User::class,'id');
    }
}
