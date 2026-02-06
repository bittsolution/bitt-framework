<?php

namespace Pulsar\Http\Middleware;

use Pulsar\Http\Request;
use Pulsar\Http\Response;

class LoggerMiddleware implements MiddlewareInterface
{
    public function process(Request $request, Response $response, callable $next): Response
    {
        return $next($request, $response);
    }
}
