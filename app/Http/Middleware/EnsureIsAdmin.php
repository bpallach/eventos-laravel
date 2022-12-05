<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureIsAdmin
{
    /**
     * Check if user is admin
     */
    public function handle(Request $request, Closure $next) {
        
        if(auth()->check()){
            if(auth()->user()->Id_tipo_usuario == 1) {
                return $next($request);
            }
        }
        return redirect()->to('/login');
    }
}