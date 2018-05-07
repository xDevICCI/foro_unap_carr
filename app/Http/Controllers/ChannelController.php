<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
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
        return view('channel.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,['title'=>'required']);
        Channel::create([
            'title'=>request('title'),
            'user_id'=>\Auth::user()->id,
        ]);
        $notification = ['message'=>'new channel has been created','alert-type'=>'success'];
        return redirect()->back()->with($notification);  
    }

    public function show(Channel $channel)
    {
        //
    }

    public function edit(Channel $channel)
    {
        return view('channel.edit')->with('channel',$channel);
    }

    public function update(Request $request , Channel $channel)
    {
         $this->validate($request,['title'=>'required']);

         $channel->title = $request->title;
         $channel->user_id = \Auth::user()->id;
         $channel->save();

         $notification = ['message'=>'channel updated ','alert-type'=>'success'];
         return redirect()->route('create_channel')->with($notification);
    }

    public function destroy(Channel $channel)
    {
        $channel->delete();
        $notification = ['message'=>'channel has been deleted','alert-type'=>'success'];
        return redirect()->back()->with($notification);  
    }
}
