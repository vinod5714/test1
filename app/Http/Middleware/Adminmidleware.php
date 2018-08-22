<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class Adminmidleware
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
           $u=Auth::user();
           $id=$u->id;
           $user = User::find($id);
           
           if($user->type != "admin")
           {
               return redirect('/through');
           }
        return $next($request);
    }
}
