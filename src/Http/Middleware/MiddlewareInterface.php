<?php

namespace App\Http\Middleware;

use App\Http\Request;
use App\Http\Response;

interface MiddlewareInterface
{
    public function process(Request $request, callable $next): Response;
}
