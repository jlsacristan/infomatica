<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     * Autenticar al usuario [user o admin]
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) { //usuario no validado
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('auth/login'); //usuario validado correctamente
            }
        }
        //usuario ya ha iniciado sesión...
        //usuario user quiere acceder al detalle del pedido
        if($request->path() == 'order-detail') return $next($request);
        //usuario quiere acceder como admin.. panel de control...
        //sino es admin, mensaje de error...
        if(auth()->user()->type != 'admin'){
            $message = 'Permiso denegado: Solo los administradores pueden entrar a esta sección';
            //redirrecionar al home
            return redirect()->route('home')->with('message', $message);
        }

        return $next($request);
    }
}
