<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        $user = Auth::user();
        return view('profile.profile')->with('user',$user);
    }

    public function edit(Profile $profile)
    {
        //
    }

    public function update()
    {

        $this->validate(\request(),
            [
                'name'=>'required',
                'email'=>'required',
                'description'=>'required|max:250',
                'avatar'=>'required|image|dimensions:min_width=200,min_height=200|mimes:png',
            ]);

        $user = Auth::user();

        if (\request('avatar')){
            $image = \request('avatar');
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/users/',$image_new_name);
            $user->profile->avatar = '/uploads/users/'.$image_new_name;
            $user->profile->save();
        }

            $user->name = \request('name');
            $user->email = \request('email');
            $user->profile->description = \request('description');
            $user->profile->save();
            $user->save();

        $notification = array(
            'message' => 'profile has been updated !!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(Profile $profile)
    {
        //
    }
}
