<?php

namespace App\Http\Controllers;

use Pulsar\Http\Cookie;
use Pulsar\Http\Request;
use Pulsar\Http\Response;
use Pulsar\Logger\LoggerInterface;

class HomeController
{
    public function __construct(private LoggerInterface $logger) {}

    public function __invoke(Request $req, Response $res): Response
    {
        return $res->json(["message" => "OK"])
            ->setCookie(new Cookie("test", "9999"));
    }
}
