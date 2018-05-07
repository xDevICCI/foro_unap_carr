<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Watcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatcherController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }



    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Thread $thread)
    {
        $watcher = new Watcher();
        $watcher->user_id = Auth::id();
        $watcher->thread_id = $thread->id;
        $watcher->save();

        $notification = array(
            'message' => ' you had watch this thread ',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function unwatch($id){

        $watcher = Watcher::where('user_id',$id)->where('user_id',Auth::user()->id);
        $watcher->delete();

        $notification = array(
            'message' => ' you had unwatch this thread ',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function show(Watcher $watcher)
    {
        //
    }

    public function edit(Watcher $watcher)
    {
        //
    }

    public function update(Request $request, Watcher $watcher)
    {
        //
    }

    public function destroy(Watcher $watcher)
    {
        //
    }
}
