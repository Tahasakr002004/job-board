<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyMe
{
   
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            if(auth()->user()->email === 'admin@gmail.com'){
                return $next($request);
            }else{

                return response(["message" => "You don't have proper access!"],401);
            }
        }
        return redirect('/login');
    }
}
