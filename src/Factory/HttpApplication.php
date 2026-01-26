<?php

namespace App\Factory;

use App\Http\Request;
use App\Kernel\HttpKernel;
use App\Kernel\Router;

class HttpApplication implements ApplicationInterface
{
    private Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    private function initialize(): void
    {
        config();
        container();
    }

    public function boot(): void
    {
        $this->initialize();
    }

    public function run(): void
    {
        $this->boot();
        $request = Request::fromGlobals();
        $kernel = new HttpKernel($this->router);
        $response = $kernel->handle($request);
        $response->send();
    }

    public function addRoute(
        string $method,
        string $path,
        mixed $controller,
        array $middlewares = []
    ) {
        $this->router->add($method, $path, $controller, $middlewares);
    }
}
