<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class isAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    // Verificar si el usuario está autenticado
    if (Auth::check()) {
        if (Auth::user()->rol === 'administrador') {
            return $next($request); 
        }
        // Redirigir a la página de inicio si no es administrador
        return redirect()->route('home'); 
    }
    // Redirigir al login si no está autenticado
    return redirect()->route('login');
    }
}
