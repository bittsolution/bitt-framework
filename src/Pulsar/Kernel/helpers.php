
<?php

use Pulsar\Config\ConfigurationManager;
use Pulsar\DI\Container;
use Pulsar\DI\ContainerManager;

if (!function_exists('container')) {
    function container(): Container
    {
        return ContainerManager::get();
    }
}

if (!function_exists('config')) {
    function config(): ConfigurationManager
    {
        return ConfigurationManager::getInstance();
    }
}
