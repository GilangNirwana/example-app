<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Captcha
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

        if($request->route()->parameter('email')){
            Session::put('email', $request->route()->parameter('email'));
        }

       if (Session::get('captcha')){
           return $next($request);

       }else{
              return redirect()->back()->withErrors(['Captcha is required']);
       }
    }
}
