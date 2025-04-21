<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role !== 'admin') {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Accés no autoritzat. Sessió tancada.');
        }
        
        return $next($request);
    }
}