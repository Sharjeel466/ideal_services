<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        if (Auth::user()) {
            if (Auth::user()->role->id == 1) {
            }
            elseif(Auth::user()->role->id == 3){
                return redirect('saudia/transaction');
            }
            elseif(Auth::user()->role->id == 2){
                return redirect('pakistan/transaction');
            }
        }
        else{
            return redirect('login')->with('msg', 'Access Denied !!!');
        }

        return $next($request);
    }
}
