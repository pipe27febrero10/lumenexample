<?php

namespace App\Http\Middleware;

use Closure;

class JsonMiddleware
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
        if(!$request->isJson()){
           // return response()->json(["name" => "felipe","age" => "23","courses" =>[["name"=>"biology","average"=>"7.3"],["name"=>"physics","average"=>"9.2"],["name" => "mathematics","average" =>"9.9"]]
//] );
         return response()->json(['error'=>'Unauthorized'],401,[]);
        }
        return $next($request);
    }
}
