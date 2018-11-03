<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = ['title','is_published']; //aqui estaba dentro del arreglo fillable->user_id

    public function threads(){
        return $this->hasMany(Thread::class);
    }


}
