<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
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
        $this->validate(\request(),['title'=>'required','content'=>'required']);

        $reply = new Reply();
        $reply->title = \request('title');
        $reply->content = \request('content');
        $reply->thread_id = $thread->id;
        $reply->user_id = Auth::user()->id;
        $reply->user->points += 6 ;
        $reply->user->save();
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
        return view('reply.edit')->with('reply',$reply);
    }

    public function update(Request $request, Reply $reply)
    {
        $this->validate($request, ['title'=>'required']);
        $reply->title = $request->input('title');
        $reply->content = $request->input('content');
        $reply->user_id = Auth::user()->id;
        $reply->thread_id = $reply->thread->id;
        $reply->update();
        $notification = ['message'=>$reply->title.' your reply has been update ','alert-type'=>'success'];
        return redirect()->route('show_thread_id',[$reply->thread->slug])->with($notification);
    }

    public function destroy(Reply $reply)
    {
        $reply->delete();
        $notification = ['message'=>$reply->title.' your reply has been deleted ','alert-type'=>'success'];
        return redirect()->route('show_thread_id',[$reply->thread->slug])->with($notification);
    }

    public function bestanswer(){

    }

    public function makebestanswer(Reply $reply){

        $reply->best_answer = 1;
        $reply->user->points += 17;
        $reply->user->save();
        $reply->update();
        $notification = ['message'=>$reply->title.' has made a best answer ','alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }
}
