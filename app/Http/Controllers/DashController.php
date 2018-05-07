<?php

namespace App\Http\Controllers;

use App\Thread;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class DashController extends Controller
{
  public function __construct(){
      $this->middleware('auth')->except('index_forum');
  }

    public function index()
    {
        return view('dashboard.index');
    }

    public function index_forum(){

        switch(\request('filter')){
          
        case 'all':
            $threads = Thread::paginate(5);
        break;

        case 'me':
        $threads = Thread::where('user_id',\Auth::user()->id)->paginate(3);
        break;

        case 'sloved':
        $sloved = array();
            foreach(Thread::all() as $thread){
                if($thread->hasclosed()){
                    array_push($sloved,$thread);
                }
            } 
            $threads = new Paginator($sloved,10);
        break;

        case 'notsloved':
        $notsloved = array();
            foreach(Thread::all() as $thread){
                if(!$thread->hasclosed()){
                    array_push($notsloved,$thread);
                }
            }
            $threads = new Paginator($notsloved,10);
        break;

        case 'old':
            $threads = Thread::orderby('created_at','asc')->paginate(5);
            break;

        case 'new':
            $threads = Thread::orderBy('created_at','desc')->paginate(5);
            break;

        default : 
            $threads = Thread::orderby('id','desc')->paginate(5);
        }
        return view('forum')->with('threads',$threads);
    }
}
