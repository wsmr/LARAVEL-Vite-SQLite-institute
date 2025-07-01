<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class CacheResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Don't cache if user is authenticated
        if ($request->user()) {
            return $next($request);
        }

        // Don't cache POST, PUT, DELETE requests
        if (!$request->isMethod('GET')) {
            return $next($request);
        }

        // Generate cache key based on full URL
        $key = 'page_cache_' . sha1($request->fullUrl());

        // Check if we have a cache for this request
        if (Cache::has($key)) {
            return response(Cache::get($key));
        }

        // Process the request
        $response = $next($request);

        // Cache the response for 60 minutes if it's successful
        if ($response->isSuccessful()) {
            Cache::put($key, $response->getContent(), 60 * 60);
        }

        return $response;
    }
}
