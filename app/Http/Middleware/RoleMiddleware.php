<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();

        
        // Para usuarios registrados
        if ($user && in_array($user->role, $roles)) {
            return $next($request); 
        }

        // Para invitados sin registro o usuarios sin sesión abierta
        if (in_array('guest', $roles)) {
            return $next($request);
        }


        // Accesos no autorizados
        return redirect('/not-found'); 
    }
}
