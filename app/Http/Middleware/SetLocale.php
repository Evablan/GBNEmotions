<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si hay parámetro 'lang' en la URL
        if ($request->has('lang')) {
            $locale = $request->get('lang');
            
            // Verificar que el idioma sea válido
            if (in_array($locale, ['en', 'es', 'fr'])) {
                // Cambiar el idioma de la aplicación
                app()->setLocale($locale);
                
                // Guardar la preferencia en la sesión
                session()->put('locale', $locale);
            }
        }
        // Si no hay parámetro en URL, usar la sesión
        elseif (session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
        }
        
        return $next($request);
    }
}