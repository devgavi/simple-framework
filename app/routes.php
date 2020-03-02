<?php

use App\Core\Route;

Route::setRoutes([
    '/' => 'IndexController',
    'about' => 'AboutController',
    'contact' => 'ContactController@info',
]);
