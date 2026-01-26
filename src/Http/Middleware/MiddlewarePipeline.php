<?php

namespace App\Http\Middleware;

use App\Http\Request;
use App\Http\Response;
use App\Http\Route;
use App\Kernel\ControllerResolver;

final class MiddlewarePipeline
{
    private array $middlewares = [];

    public function __construct(
        private ControllerResolver $resolver
    ) {}

    public function setMiddlewares(array $middlewares): void
    {
        $this->middlewares = $middlewares;
    }

    public function handle(Request $request, Route $route): Response
    {
        $next = fn(Request $req) => $this->callController($route, $req);

        foreach (array_reverse($this->middlewares) as $middleware) {
            $next = function (Request $req) use ($middleware, $next) {
                $instance = container()->get($middleware);
                return $instance->process($req, $next);
            };
        }

        return $next($request);
    }

    private function callController(Route $route, Request $request): Response
    {
        $controller = $this->resolver->resolve($route);
        return $controller($request);
    }
}
