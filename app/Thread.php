<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = ['user_id','channel_id','title','content','is_published'];

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function channel(){
        return $this->belongsTo(Channel::class);
    }

    public function user(){
        return  $this->belongsTo(User::class);
    }
}
