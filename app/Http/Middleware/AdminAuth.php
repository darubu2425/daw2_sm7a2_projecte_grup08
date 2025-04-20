<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle(Request $request, Closure $next): Response
{
    if (auth()->user()->role !== 'admin') {
        return redirect()->route('dashboard-consultor')->with('error', 'Accés no autoritzat');
        // Cambia 'dashboard-basic' por 'dashboard-consultor'
    }
    return $next($request);
}
}