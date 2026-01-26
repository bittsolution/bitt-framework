<?php

namespace App\Kernel;

use App\Http\Request;
use App\Http\Response;

interface KernelInterface
{
    public function handle(Request $request): Response;
}
