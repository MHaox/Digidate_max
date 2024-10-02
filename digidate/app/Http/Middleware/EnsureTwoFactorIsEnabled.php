<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureTwoFactorIsEnabled
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
        // Check if two-factor authentication is enabled
        if ($request->user() && $request->user()->two_factor_enabled) {
            // Check if the user has completed two-factor authentication
            if (!$request->session()->has('two_factor_verified')) {
                return redirect()->route('two-factor.login');
            }
        }

        return $next($request);
    }
}