<?php

namespace Pulsar\Http;

use Pulsar\Http\Request;

interface RouterInterface
{
    public function match(Request $request): mixed;
}
