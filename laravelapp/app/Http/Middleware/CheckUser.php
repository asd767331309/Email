<?php

namespace App\Http\Middleware;

use Closure;

class CheckUser
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
        if(!isset($_SESSION)){
            session_start();
        }
        //return var_dump(isset($_SESSION['username']));
        if(!(isset($_SESSION['username'])))
        {
            return redirect('login');
        }
        //return var_dump("hi andre...");
        return $next($request);
    }
}
