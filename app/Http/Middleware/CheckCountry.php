<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCountry
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $country = [
            'az',
            'us',
            'de',
            'tr'
        ];

        if (!in_array($request->country, $country) && !request()->is('unavailable')) {
            return redirect()->route('unavailable');
        }

        return $next($request);
    }
}
