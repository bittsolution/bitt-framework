<?php

namespace App\Logger;

use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;

class ConsoleLogger implements LoggerInterface
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger("app");
        $this->logger->pushHandler(new StreamHandler('php://stdout', Level::Debug));
    }

    public function log(string $message): void
    {
        $this->logger->info($message);
    }
}
