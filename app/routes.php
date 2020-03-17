<?php

use App\Core\Route;
use App\Controller\NotFoundController;

Route::get('/', [
    'App\Controller\IndexController',
    'index'
]);

Route::get('about', [
    'App\Controller\AboutController',
    'index'
]);

// if route does not match
Route::dispatch(NotFoundController::class, 'index');
