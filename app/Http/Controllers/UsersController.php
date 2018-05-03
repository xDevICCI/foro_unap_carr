<?php

namespace App\Http\Controllers;

use App\Mail\registrationmail;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\VerifyUser;
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
        return view('users.new');
    }

    public function store()
    {
        $this->validate(\request(),[
           'name'=>'required',
           'email'=>'required|unique:users',
           'password'=>'required|confirmed',
            'avatar'=>'image|required',
            'role'=>'required',
            'description'=>'required|max:500',

        ]);
        $user = User::create([
            'name'=>\request('name'),
            'email'=>\request('email'),
            'password'=>bcrypt(\request('password')),
            'role'=>\request('role'),
        ]);
        $profile = new Profile();
        $profile->user_id = $user->id;
        $image = \request('avatar');
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/users/',$image_new_name);
        $profile->avatar = '/uploads/users/'.$image_new_name;
        $profile->description = \request('description');
        $profile->ip = \request()->ip();
        $profile->save();

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(str_random(10))
        ]);

        Mail::to($user)->send(new registrationmail($user));

        $notification = array(
            'message' => 'new user has been add check the email !!',
            'alert-type' => 'success'
        );
        return redirect()->route('show_all_users')->with($notification);
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

    public function destroy(User $user)
    {
        if (Auth::user()->id == $user->id){
            $notification = array(
                'message' => 'you can\'t delete your account stupid !!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        $user->profile()->delete();
        $user->delete();

        $notification = array(
            'message' => 'user has been deleted !!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
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



    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
    
        if(isset($verifyUser) ){
        $user = $verifyUser->user;
   
        if(!$user->verified) {
        $verifyUser->user->verifed = 1;
        $verifyUser->user->save();
        $notification = array(
        'message' => $user->name . ' Your e-mail is verified. You can now login. !!',
        'alert-type' => 'success'
    );
    }else{
        $notification = array(
        'message' => $user->name . ' Your e-mail is already verified. You can now login. !!',
        'alert-type' => 'warning'
    );
    }
    }else{
        $notification = array(
            'message' => $user->name . ' your email not verified !!',
            'alert-type' => 'error'
        );
        return redirect('/login')->with($notification);
    }
    return redirect('/login')->with($notification);
    }
 

}
