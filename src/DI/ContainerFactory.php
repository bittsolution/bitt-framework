<?php

namespace App\DI;

use App\Http\CookieEncrypter;
use App\Http\CookieSigner;
use App\Logger\ConsoleLogger;
use App\Logger\LoggerInterface;

class ContainerFactory
{
    public static function create(): Container
    {
        $container = new Container();

        // Register services and dependencies here
        // e.g., $container->set(ServiceInterface::class, new ServiceImplementation());

        $container->set(CookieSigner::class, fn(Container $container) => new CookieSigner(config()->http()->cookieSecret));
        $container->set(CookieEncrypter::class, fn(Container $container) => new CookieEncrypter(config()->http()->cookieSecret));

        $container->set(LoggerInterface::class, ConsoleLogger::class);


        return $container;
    }
}
