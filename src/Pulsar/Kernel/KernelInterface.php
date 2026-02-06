<?php

namespace Pulsar\Kernel;

use Pulsar\Http\Request;
use Pulsar\Http\Response;

interface KernelInterface
{
    public function handle(Request $request, Response $response): Response;
}
