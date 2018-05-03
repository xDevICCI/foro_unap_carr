<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index()
    {
        return view('users.index')->with('users',User::paginate(5));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    public function makeadmin(User $user){

        if ($user->id == Auth::user()->id) {
            $notification = array(
                'message' => 'you can\'t change permission for your self !!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else {
            if ($user->role == false) {
                $user->role = 1;
                $user->save();

                $notification = array(
                    'message' => $user->name . ' is admin now !!',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'this user is alerdy admin !!',
                    'alert-type' => 'warning'
                );
            }
        }

        return redirect()->back()->with($notification);
    }

    public function makesubscriber(User $user){
        if ($user->id == Auth::user()->id){
            $notification = array(
                'message' => $user->name.' you can\'t change permssion to your self!!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else {
            $user->role = 0;
            $user->save();
            $notification = array(
                'message' => $user->name . ' now is a subscriber !!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}
