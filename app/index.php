<?php

declare(strict_types=1);

ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
ini_set('output_buffering', 'On');

error_reporting(E_ALL);

const ROOT = __DIR__ . '/../';
const APP = __DIR__ . '/';

require_once ROOT . 'vendor/autoload.php';

ob_start();
require_once APP . 'routes.php';
