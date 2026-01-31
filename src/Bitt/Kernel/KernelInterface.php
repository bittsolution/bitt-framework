<?php

namespace Bitt\Kernel;

use Bitt\Http\Request;
use Bitt\Http\Response;

interface KernelInterface
{
    public function handle(Request $request, Response $response): Response;
}
