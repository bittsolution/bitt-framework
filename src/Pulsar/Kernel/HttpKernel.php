<?php

namespace Pulsar\Kernel;

use Pulsar\Http\ControllerResolver;
use Pulsar\Http\Middleware\CookieMiddleware;
use Pulsar\Http\Middleware\CorsMiddleware;
use Pulsar\Http\Middleware\JsonMiddleware;
use Pulsar\Http\Middleware\LoggerMiddleware;
use Pulsar\Http\Middleware\MiddlewarePipeline;
use Pulsar\Http\Request;
use Pulsar\Http\Response;
use Pulsar\Http\RouterInterface;

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

    public function handle(Request $request, Response $response): Response
    {
        $route = $this->router->match($request);
        $this->pipeline->setMiddlewares(array_merge($this->coreMiddlewares(), $route->middlewares()));
        return $this->pipeline->handle($request, $response, $route);
    }

    private function coreMiddlewares(): array
    {
        return [
            CorsMiddleware::class,
            CookieMiddleware::class,
            JsonMiddleware::class,
            LoggerMiddleware::class,
        ];
    }
}
