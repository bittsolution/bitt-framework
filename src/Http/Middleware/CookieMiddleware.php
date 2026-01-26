<?php

namespace App\Http\Middleware;

use App\Http\CookieSigner;
use App\Http\CookieEncrypter;
use App\Http\Request;
use App\Http\Response;

final class CookieMiddleware implements MiddlewareInterface
{
    public function process(Request $request, callable $next): Response
    {
        $signer = container()->get(CookieSigner::class);
        $encrypter = container()->get(CookieEncrypter::class);

        $cookies = $request->cookies();

        // 1️⃣ Signed cookies
        foreach ($this->signed() as $name) {
            $value = $signer->verify($cookies->raw($name));

            if ($value !== null) {
                $cookies->setResolved($name, $value);
            }
        }

        // 2️⃣ Encrypted cookies
        foreach ($this->encrypted() as $name) {
            $value = $encrypter->decrypt($cookies->raw($name));

            if ($value !== null) {
                $cookies->setResolved($name, $value);
            }
        }

        $response = $next($request);

        return $response;
    }

    private function signed(): array
    {
        return ['user_id'];
    }

    private function encrypted(): array
    {
        return ['session_id'];
    }
}
