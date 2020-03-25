<?php

declare(strict_types=1);

ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
ini_set('output_buffering', 'On');

error_reporting(E_ALL);

const ROOT = __DIR__ . '/../';
const APP = __DIR__ . '/';

$container = require_once APP . 'bootstrap.php';

function container($key)
{
    global $container;

    return $container->get($key);
}

require_once APP . 'routes.php';
