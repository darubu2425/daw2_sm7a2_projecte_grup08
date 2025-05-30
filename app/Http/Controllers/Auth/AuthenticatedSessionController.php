<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        // Si ya está autenticado, redirigir al dashboard correspondiente
        if (Auth::check()) {
            return $this->redirectToDashboard();
        }
        
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();
        
        // Limpiar cualquier redirección previa no autorizada
        $this->clearIntendedUrl();
        
        // Redirigir al dashboard según el rol
        return $this->redirectToDashboard();
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Redirige al dashboard según el rol del usuario
     */
    protected function redirectToDashboard(): RedirectResponse
    {
        return redirect()->route(
            auth()->user()->role === 'admin' 
                ? 'dashboard-admin' 
                : 'dashboard-consultor'
        );
    }
    
    /**
     * Limpia la URL previa almacenada para evitar redirecciones no deseadas
     */
    protected function clearIntendedUrl(): void
    {
        session()->forget('url.intended');
    }
}