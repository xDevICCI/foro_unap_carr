<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = ['id','title','user_id','is_published'];

    public function threads(){
        return $this->hasMany(Thread::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
