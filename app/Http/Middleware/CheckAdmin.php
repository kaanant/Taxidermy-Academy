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
<<<<<<< HEAD
        if(!$request->user()->isAdmin()){
            return redirect('admin');
=======
        /*if(!$request->user()->isAdmin()){
            return redirect('admin.login');
>>>>>>> ea71ba372f884a4820ccf57ea6fe530fcbc08fba
        }
        return $next($request);*/
    }
}
