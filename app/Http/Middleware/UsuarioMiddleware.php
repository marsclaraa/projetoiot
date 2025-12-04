<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsuarioMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Apenas checa se o usuário atual está logado (autenticado)
        if (auth()->check()) {
            return $next($request);
        }

        // Se não estiver logado, redireciona para a página de login por padrão
        return redirect()->route('login');
    }
}
