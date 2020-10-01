<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        $user = $request->session()->get('admin');
        if($user===null){
        return redirect('/login')->with('error','Authentication Required!');
        }
        else{

        }
        return $next($request);
    }
}
