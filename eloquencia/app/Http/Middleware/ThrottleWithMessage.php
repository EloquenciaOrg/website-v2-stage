<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Http\Exceptions\ThrottleRequestsException;

class ThrottleWithMessage extends ThrottleRequests
{
    public function handle($request, Closure $next, $maxAttempts = 60, $decayMinutes = 1, $prefix = '')
    {
        try {
            return parent::handle($request, $next, $maxAttempts, $decayMinutes, $prefix);
        } catch (ThrottleRequestsException $e) {
            $retryAfter = $e->getHeaders()['Retry-After'] ?? 60;
            $minutes = ceil($retryAfter / 60); // convertit en minutes, arrondi au supérieur

            return back()->withErrors(['throttle' => 'Trop de tentatives. Veuillez réessayer dans ' . $minutes . ' minutes.']);
        }
    }
}
