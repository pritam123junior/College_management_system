<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(Auth::user()->type==='Admin'){
            return $next($request);
        }
        elseif(Auth::user()->type==='Teacher'){
            return redirect()->route('teacher.dashboard');
        }
        elseif(Auth::user()->type==='Student'){
            return redirect()->route('dashboard');
        }             
        
    }
}
