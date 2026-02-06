<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use Pulsar\Http\Cookie;
use Pulsar\Http\Response;

class LoginController
{
    public function __invoke(LoginRequest $req, Response $res): Response
    {
        $email = $req->email();
        $password = $req->password();

        $res->setEncryptedCookie(new Cookie("access_token", ""));
        $res->setEncryptedCookie(new Cookie("refresh_token", ""));

        return $res->json([
            "userId" => "",
            "accessToken" => "",
            "refreshToken" => "",
        ]);
    }
}
