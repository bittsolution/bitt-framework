<?php

namespace Service\Http\Controllers;

use App\Http\JsonResponse;
use App\Http\Request;
use App\Http\Response;
use App\Logger\LoggerInterface;

class HomeController
{
    public function __construct(private LoggerInterface $logger) {}

    public function __invoke(Request $request): Response
    {
        return (new JsonResponse(["message" => "Hello, World!"]))->setEncryptedCookie(
            new \App\Http\Cookie(
                name: 'user_id',
                value: '123'
            )
        );
    }
}
