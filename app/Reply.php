<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['content','best_answer','user_id','thread_id'];

    public function thread(){
        return $this->belongsTo(Thread::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
