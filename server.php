<?php

if (php_sapi_name() !== 'cli') {
    exit('Must be used by cli');
}

echo 'Built-in server has been started...' . PHP_EOL;
shell_exec('php -S localhost:8000 -t app/');
