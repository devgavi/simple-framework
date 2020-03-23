<?php

use App\Core\Route;

Route::get('/', function () {
    return [
        'IndexController',
        'index'
    ];
});

Route::get('about', function () {
    return [
        'AboutController',
        'index'
    ];
});

// if route does not match
Route::dispatch('NotFoundController', 'index');
