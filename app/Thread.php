<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function watchers(){
        return $this->hasMany(Watcher::class);
    }

    public function is_watching(){

        $user_id = Auth::id();

        $watchers = array();

        foreach ($this->watchers() as $watcher) {
            array_push($watchers, $watcher->id);
        }
           if (in_array($user_id,$watchers)){
               return true;
           }
           else{
               return false;
           }
    }

    public function hasclosed(){
        $result = false;
        foreach($this->replies as $reply){
            if($reply->best_answer){
                return true;
                break;
            }else{
                return $result;
            }
        }
    }
}
