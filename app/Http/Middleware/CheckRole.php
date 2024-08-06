<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    //public function handle(Request $request, Closure $next, $role)
    //{
       // if (!Auth::check() || Auth::user()->employee_role !== $role) {
      //      return redirect('/no-access');
       // }
    
        //return $next($request);
    //}
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        if ($user->employee_role !== $role) {
            return redirect('/no-access');
        }

        return $next($request);
    }
}
