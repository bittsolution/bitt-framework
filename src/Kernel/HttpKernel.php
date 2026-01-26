<?php

namespace App\Kernel;

use App\Http\Middleware\MiddlewarePipeline;
use App\Http\Request;
use App\Http\Response;

class HttpKernel implements KernelInterface
{
    private MiddlewarePipeline $pipeline;

    public function __construct(
        private RouterInterface $router
    ) {
        $this->pipeline = new MiddlewarePipeline(
            new ControllerResolver()
        );
    }

    public function handle(Request $request): Response
    {
        $route = $this->router->match($request);
        $this->pipeline->setMiddlewares($route->middlewares());
        return $this->pipeline->handle($request,  $route);
    }
}
