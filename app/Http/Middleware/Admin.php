<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->role){
            $notification = array('message' => Auth::user()->name . ' you are not admin !!', 'alert-type' => 'warning'
        );
            return redirect()->back()->with($notification);
        }
        return $next($request);

    }
}
