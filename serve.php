<?php

if (php_sapi_name() !== 'cli') {
    exit('Must be used by cli');
}

if (isset($argc[1])) {
    $target = $argv[2];
} else {
    $target = 'app/';
}

echo 'Built-in server has been started...' . PHP_EOL;
shell_exec('php -S localhost:8000 -t ' . $target);
