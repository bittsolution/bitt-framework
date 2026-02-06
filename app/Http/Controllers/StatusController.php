<?php

namespace App\Http\Controllers;

use Pulsar\Http\Request;
use Pulsar\Http\Response;
use Pulsar\Logger\LoggerInterface;

class StatusController
{
    public function __construct(private LoggerInterface $logger) {}

    public function __invoke(Request $req, Response $res): Response
    {
        return $res->json(["status" => "( •_•) API is running!"]);
    }
}
