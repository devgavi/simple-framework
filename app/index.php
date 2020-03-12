<?php

declare(strict_types=1);

define('ROOT', __DIR__ . '/../');
define('APP', __DIR__ . '/');

ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');

error_reporting(E_ALL);

require_once ROOT . 'vendor/autoload.php';

$bootstrap = new App\Core\Bootstrap();
$bootstrap->run();

require_once APP . 'routes.php';
