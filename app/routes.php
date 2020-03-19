<?php

use App\Core\Route;
use App\Controller\NotFoundController;

Route::get('/', function () {
    return [
        'App\Controller\IndexController',
        'index'
    ];
});

Route::get('about', function () {
    return [
        'App\Controller\AboutController',
        'index'
    ];
});

// if route does not match
Route::dispatch(NotFoundController::class, 'index');
