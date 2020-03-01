<?php

declare(strict_types=1);

use App\Bootstrap;

ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');

error_reporting(E_ALL);

require_once '../vendor/autoload.php';

$bootstrap = new Bootstrap();
$bootstrap->start();
