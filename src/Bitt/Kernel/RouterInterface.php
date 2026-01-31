<?php

namespace Bitt\Kernel;

use Bitt\Http\Request;

interface RouterInterface
{
    public function match(Request $request): mixed;
}
