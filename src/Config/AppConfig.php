<?php

namespace App\Config;

class AppConfig
{
    public string $serviceName;
    public string $environment;
    public string $logger;
    public string $secret;
    public array $providers;
    public function __construct(array $config)
    {
        $this->serviceName = $config['service_name'] ?? 'app';
        $this->environment = $config['environment'] ?? 'production';
        $this->logger = $config['logger'] ?? 'file';
        $this->secret = $config['secret'] ?? 'secret_key';
        $this->providers = $config['providers'] ?? [];
    }
}
