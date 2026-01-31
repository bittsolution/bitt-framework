<?php

namespace Bitt\Http;

use Bitt\Http\Request;

interface RouterInterface
{
    public function match(Request $request): mixed;
}
