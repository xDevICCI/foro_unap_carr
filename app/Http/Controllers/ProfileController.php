<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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

    public function update(Request $request)
    {

        $this->validate(\request(),
            [
                'name'=>'required',
                'email'=>'required',
                'description'=>'required|max:250',
                'avatar'=>'required|image|dimensions:min_width=200,min_height=200|mimes:png',
                'password'=>'confirmed'
            ]);


        $user = Auth::user();

        if (\request('avatar')){
            $image = \request('avatar');
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/users/',$image_new_name);
            $user->profile->avatar = '/uploads/users/'.$image_new_name;
            $user->profile->save();
        }

        $current_password = $user->password;
            
        if(\Hash::check($request->current_password,$current_password)){
                if($request->has('password')){
                    $user->password = bcrypt($request->password);
                    $user->save();
                }
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
