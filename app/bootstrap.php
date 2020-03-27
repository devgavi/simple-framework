<?php

use App\Core\Cache;
use App\Core\Config;
use App\Core\Container;

require_once ROOT . 'vendor/autoload.php';

$config = new Config('config.ini');

Container::getInstance()->set('config', $config)
    ->set('cache', Cache::create($config->get('cache.type')));
