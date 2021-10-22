<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Saudia
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
            if (Auth::user()->role->id == 3) {
            }
            elseif(Auth::user()->role->id == 1){
                return redirect('admin/dashboard');
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
