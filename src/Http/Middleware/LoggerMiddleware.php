<?php

namespace App\Http\Middleware;

use App\Http\Request;
use App\Http\Response;

class LoggerMiddleware implements MiddlewareInterface
{
    public function process(Request $request, callable $next): Response
    {
        var_dump($request->cookies()->get("session_id"));
        return $next($request);
    }
}
