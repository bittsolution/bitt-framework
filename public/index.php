<?php

use Bitt\Factory\HttpApplication;
use Bitt\Http\Middleware\CookieMiddleware;
use Bitt\Http\Middleware\CorsMiddleware;
use Bitt\Http\Middleware\LoggerMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;

define('BASE_PATH', dirname(__DIR__));

require dirname(__DIR__) . '/vendor/autoload.php';

$app = new HttpApplication();
$app->addRoute('GET', '/', HomeController::class, [
    CookieMiddleware::class,
    LoggerMiddleware::class,
    CorsMiddleware::class
]);

$app->addRoute('GET', '/test', TestController::class, [
    CookieMiddleware::class,
    LoggerMiddleware::class,
    CorsMiddleware::class
]);

$app->run();
