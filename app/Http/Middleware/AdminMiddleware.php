<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): mixed
    {
        // Если пользователь не имеет роли Администратора, то осуществляем редирект
        if ((int) auth()->user()->role !== User::ROLE_ADMIN) {
            return redirect()->route('auth_abort');
        }
        return $next($request);
    }
}
