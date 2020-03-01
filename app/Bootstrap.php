<?php

namespace App;

use App\Core\Route;

class Bootstrap
{
    public function start(): void
    {
        Route::getController($_SERVER['REQUEST_URI']);
    }
}
