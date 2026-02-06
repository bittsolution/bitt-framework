<?php

namespace Pulsar\Http\Middleware;

use Pulsar\Http\Request;
use Pulsar\Http\Response;

interface MiddlewareInterface
{
    public function process(Request $request, Response $response, callable $next): Response;
}
