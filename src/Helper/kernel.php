
<?php

use App\Config\ConfigurationManager;
use App\DI\Container;
use App\DI\ContainerManager;

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
