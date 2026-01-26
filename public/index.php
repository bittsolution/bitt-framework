<?php

use App\Factory\HttpApplication;
use Service\Http\Controllers\HomeController;

define('BASE_PATH', dirname(__DIR__));

require dirname(__DIR__) . '/vendor/autoload.php';

$app = new HttpApplication();
$app->addRoute('GET', '/', HomeController::class);

$app->run();
