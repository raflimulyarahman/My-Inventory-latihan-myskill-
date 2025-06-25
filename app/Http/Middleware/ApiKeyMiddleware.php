<?php

namespace App\Http\Middleware;

use Closure;
use Error;
use Illuminate\Http\Request;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
public function handle($request, Closure $next) {
    $apiKey = config('app.api_key');

    $apiKeyIsValid = (! empty($apiKey) && $request->header('api-key') === $apiKey);

    abort_if(!$apiKeyIsValid, 403, 'Access denied. Invalid API key.');
    return $next($request);
}

}
