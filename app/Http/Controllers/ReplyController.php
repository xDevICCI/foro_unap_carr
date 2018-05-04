<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
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

        $reply = new Reply();
        $reply->title = \request('title');
        $reply->content = \request('content');
        $reply->thread_id = $thread->id;
        $reply->user_id = Auth::user()->id;
        $reply->save();

        $notification = ['message'=>'your reply has been add ','alert-type'=>'success'];
        return redirect()->back()->with($notification);

    }

    public function show(Reply $reply)
    {
        //
    }

    public function edit(Reply $reply)
    {
        //
    }

    public function update(Request $request, Reply $reply)
    {
        //
    }

    public function destroy(Reply $reply)
    {
        //
    }
}
