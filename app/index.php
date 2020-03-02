<?php

declare(strict_types=1);

use App\Bootstrap;

ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
ini_set('error_log', __DIR__ . '../logs/error.txt');

error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once 'routes.php';

$bootstrap = new Bootstrap();
$bootstrap->start();
