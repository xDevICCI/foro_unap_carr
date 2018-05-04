<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThreadRequest;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    public function index()
    {
        return view('thread.index');
    }

    public function create()
    {
        return view('thread.new');
    }

    public function store(ThreadRequest $r)
    {
        $title = request('title');

        $thread = new Thread();
        $thread->slug = str_slug($title,'-');
        $thread->title = $title;
        $thread->channel_id = request('channel_id');
        $thread->user_id = Auth::user()->id;
        $thread->content=request('content');
        $thread->save();


        $notification = ['message'=> '"'.$thread->title.'"'.' has been created','alert-type'=>'success'];

        return redirect()->route('show_thread_id',$thread->slug)->with('thread',$thread)->with($notification);
    }

    public function show($slug)
    {
        $thread = Thread::where('slug',$slug)->first();
        return view('thread.show')->with('thread',$thread);
    }

    public function edit(Thread $thread)
    {
        return view('thread.edit')->with('thread',$thread);
    }

    public function update(Request $request, Thread $thread)
    {
        $this->validate($request,
            [
                'title'=>'required',
                'content'=>'required'
            ]);
        $title = request('title');
        $thread->slug = str_slug($title,'-');
        $thread->title = $title;
        $thread->channel_id = request('channel_id');
        $thread->user_id = Auth::user()->id;
        $thread->content=request('content');
        $thread->save();


        $notification = ['message'=> '"'.$thread->title.'"'.' has been updated','alert-type'=>'success'];

        return redirect()->route('show_thread_id',$thread->slug)->with('thread',$thread)->with($notification);
    }

    public function destroy(Thread $thread)
    {
        $thread->delete();

        $notification = ['message'=> '"'.$thread->title.'"'.' has been deleted','alert-type'=>'warning'];

        return redirect()->back()->with($notification);
    }
}
