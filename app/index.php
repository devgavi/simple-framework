<?php

declare(strict_types=1);

define('ROOT', realpath('..') . '/');
define('APP', realpath('') . '/');

ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
ini_set('error_log', ROOT . 'logs/error.txt');

error_reporting(E_ALL);

require_once ROOT . 'vendor/autoload.php';

$bootstrap = new App\Core\Bootstrap();
$bootstrap->run();

require_once 'routes.php';
