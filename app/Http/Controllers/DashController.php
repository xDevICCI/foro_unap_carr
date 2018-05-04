<?php

namespace App\Http\Controllers;

use App\Thread;
use App\User;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function index_forum(){
        $users = User::all()->load('profile');
        return view('forum')->with('threads',Thread::paginate(4));
    }
}
