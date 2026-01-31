<?php

namespace Bitt\Http\Middleware;

use Bitt\Http\Request;
use Bitt\Http\Response;

class LoggerMiddleware implements MiddlewareInterface
{
    public function process(Request $request, Response $response, callable $next): Response
    {
        return $next($request, $response);
    }
}
