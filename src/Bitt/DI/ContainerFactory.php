<?php

namespace Bitt\DI;

use Bitt\Http\CookieEncrypter;
use Bitt\Http\CookieSigner;
use Bitt\Logger\ConsoleLogger;
use Bitt\Logger\LoggerInterface;

class ContainerFactory
{
    public static function create(): Container
    {
        $container = new Container();

        // Register services and dependencies here
        // e.g., $container->set(ServiceInterface::class, new ServiceImplementation());

        $container->set(CookieSigner::class, fn(Container $container) => new CookieSigner(config()->http()->cookie->secret));
        $container->set(CookieEncrypter::class, fn(Container $container) => new CookieEncrypter(config()->http()->cookie->secret));

        $container->set(LoggerInterface::class, ConsoleLogger::class);


        return $container;
    }
}
