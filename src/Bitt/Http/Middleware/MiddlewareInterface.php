<?php

namespace Bitt\Http\Middleware;

use Bitt\Http\Request;
use Bitt\Http\Response;

interface MiddlewareInterface
{
    public function process(Request $request, Response $response, callable $next): Response;
}
