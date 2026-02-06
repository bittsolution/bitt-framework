<?php

namespace Pulsar\DI;

use Pulsar\Http\CookieEncrypter;
use Pulsar\Http\CookieSigner;
use Pulsar\Logger\ConsoleLogger;
use Pulsar\Logger\LoggerInterface;

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
