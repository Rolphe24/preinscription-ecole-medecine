<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckReferer
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
        $referer = $request->headers->get('referer');
        $host = $request->getHost();
        $rootUrl = $request->root();

        // Vérifiez si le referer est vide ou si le host du referer ne correspond pas à votre application
        if (empty($referer) || parse_url($referer, PHP_URL_HOST) !== $host) {
            // Rediriger vers la page d'accueil ou une page d'erreur
            return redirect($rootUrl);
        }

        return $next($request);
    }
}
