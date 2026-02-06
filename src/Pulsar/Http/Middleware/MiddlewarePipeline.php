<?php

namespace Pulsar\Http\Middleware;

use Pulsar\Http\ControllerArgumentResolver;
use Pulsar\Http\Request;
use Pulsar\Http\Response;
use Pulsar\Http\Route;
use Pulsar\Http\ControllerResolver;

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

    public function handle(Request $request, Response $response, Route $route): Response
    {
        $next = fn(Request $req, Response $res) => $this->callController($route, $req, $res);

        foreach (array_reverse($this->middlewares) as $middleware) {
            $next = function (Request $req, Response $res) use ($middleware, $next) {
                $instance = container()->get($middleware);
                return $instance->process($req, $res, $next);
            };
        }

        return $next($request, $response);
    }

    private function callController(Route $route, Request $request, Response $response): Response
    {
        $controller = $this->resolver->resolve($route);
        $argumentResolver = new ControllerArgumentResolver();
        $requestResolved = $argumentResolver->resolve($controller, $request);
        return $controller($requestResolved, $response);
    }
}
