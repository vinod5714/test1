<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
class Usermidleware
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
           
           if($user->type != "user")
           {
               return redirect('/through');
           }
        return $next($request);
    }
}
