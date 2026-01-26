<?php

namespace App\Kernel;

use App\Http\Request;

interface RouterInterface
{
    public function match(Request $request): mixed;
}
