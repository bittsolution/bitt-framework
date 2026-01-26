<?php

namespace App\Config;

class HttpConfig
{
    public string $cookieSecret;
    public bool $cookieSecure;
    public string $cookieSameSite;

    public function __construct(array $config)
    {
        $this->cookieSecret = $config['cookie']['secret'] ?? 'default_secret';
        $this->cookieSecure = $config['cookie']['secure'] ?? false;
        $this->cookieSameSite = $config['cookie']['same_site'] ?? 'Lax';
    }
}
