<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidatePasswordStrength
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('password') && !empty($request->password)) {
            $password = $request->password;
            
            // Vérification de la longueur minimale
            if (strlen($password) < 6) {
                return back()->withErrors(['password' => 'Le mot de passe doit contenir au moins 6 caractères.']);
            }
            
            // Vérification de la complexité (optionnel)
            if (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d)/', $password)) {
                return back()->withErrors(['password' => 'Le mot de passe doit contenir au moins une lettre et un chiffre.']);
            }
        }
        
        return $next($request);
    }
} 