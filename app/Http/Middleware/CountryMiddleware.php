<?php

namespace App\Http\Middleware;

use Closure;

class CountryMiddleware
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
        if(!$request->input('age')){
             if ($request->age < 18) {
           
            return redirect('/errorage');
              }
        }

        if(!$request->age){
             if ($request->input('age') < 18) {
           
            return redirect('/errorage');
              }
        }

       
        return $next($request);
    }
}
