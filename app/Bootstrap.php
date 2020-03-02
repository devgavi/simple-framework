<?php

namespace App;

use App\Core\Route;
use Exception;

class Bootstrap
{
    public function start(): void
    {
        try {
            Route::init();
            Route::run();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
