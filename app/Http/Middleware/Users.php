<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Response;

class users {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Auth::User()->user_type == 'user') {
          
               // return new Response('<h5 class="text-center text-danger">Permission denied</h5>');

               // return redirect()->back()->with('error','Permission denied');
            
        }
        return $next($request);
    }
}
