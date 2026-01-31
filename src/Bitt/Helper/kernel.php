
<?php

use Bitt\Config\ConfigurationManager;
use Bitt\DI\Container;
use Bitt\DI\ContainerManager;

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
