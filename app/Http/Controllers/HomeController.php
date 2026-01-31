<?php

namespace App\Http\Controllers;

use Bitt\Http\Cookie;
use Bitt\Http\Request;
use Bitt\Http\Response;
use Bitt\Logger\LoggerInterface;

class HomeController
{
    public function __construct(private LoggerInterface $logger) {}

    public function __invoke(Request $req, Response $res): Response
    {
        return $res->json(["message" => "OK"])
            ->setCookie(new Cookie("test", "9999"));
    }
}
