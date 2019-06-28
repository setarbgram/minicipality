<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()){
            return redirect('/login');
        }

        if(!$request->user()->isAdmin()){

            return redirect('/login');

        }
        return $next($request);
}
}