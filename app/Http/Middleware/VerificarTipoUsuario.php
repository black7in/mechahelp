<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarTipoUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $type): Response
    {
        // Verificar el tipo de usuario
        if (auth()->check() && auth()->user()->type === (int) $type) {
            return $next($request);
        }

        // Redirigir o manejar la denegación de acceso
        abort(404);
    }
    
}
