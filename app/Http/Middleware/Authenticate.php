<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class Authenticate
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
        if(!Session::has('user')){
            return redirect('login')->with('error','Please logged In');
        }
        return $next($request);
    }
}
