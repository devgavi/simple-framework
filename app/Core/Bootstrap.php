<?php

namespace App\Core;

use Throwable;

class Bootstrap
{
    public function run(): void
    {
        try {
            $config = new Config();
        } catch (Throwable $e) {
            echo $e->getMessage();
        }
    }
}
