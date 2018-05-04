<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = ['title','user_id','is_published'];

    public function threads(){
        return $this->hasMany(Thread::class);
    }

  
}
