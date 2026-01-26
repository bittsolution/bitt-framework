<?php

namespace App\Logger;

use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;

class FileLogger implements LoggerInterface
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger("app");
        $this->logger->pushHandler(new StreamHandler(__DIR__ . '/app.log', Level::Debug));
    }

    public function log(string $message): void
    {
        $this->logger->info($message);
    }
}
