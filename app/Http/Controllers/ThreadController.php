<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThreadRequest;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comments;
use Illuminate\Support\Facades\Input;

use Response;

class ThreadController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('show');
    }

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
        $thread->title = request('title');
        $thread->user_id = Auth::user()->id;
        $thread->content=request('content');
        $thread->user->points += 10;
        $thread->user->save();
        $thread->save();


        $notification = ['message'=> '"'.$thread->title.'"'.' has been created','alert-type'=>'success'];

        return redirect()->route('show_thread_id',$thread->slug)->with('thread',$thread)->with($notification);
    }

    public function show($slug)
    {
        $thread = Thread::where('slug',$slug)->first();
        $bestanswer = $thread->replies()->where('best_answer',1)->first();
        return view('thread.show')->with('thread',$thread)->with('bestanswer',$bestanswer);
    }

    public function edit(Thread $thread)
    {
        if (Auth::id() == $thread->user_id) {
            return view('thread.edit')->with('thread', $thread);
        }
        else{
            return redirect()->route('forum');
        }
    }

    public function update(Request $request, Thread $thread)
    {
        $this->validate($request,
            [
                'title'=>'required',
                'content'=>'required'
            ]);

        if (Auth::id() == $thread->user_id){
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
        else{
            $notification = ['message'=>'you cant do that ','alert-type'=>'error'];
            return redirect()->back()->with($notification);

        }

    }

    public function destroy(Thread $thread)
    {
        if (Auth::id() == $thread->user_id){
            $thread->delete();
            $notification = ['message' => '"' . $thread->title . '"' . ' has been deleted', 'alert-type' => 'success'];
            return redirect()->back()->with($notification);
       }

        if ( Auth::user()->role == true) {
            $thread->delete();
            $notification = ['message' => '"' . $thread->title . '"' . ' has been deleted', 'alert-type' => 'success'];
            return redirect()->back()->with($notification);

        }else {
            $notification = ['message' => ' you cant delete ', 'alert-type' => 'error'];
            return redirect()->back()->with($notification);
        }

    }


}
