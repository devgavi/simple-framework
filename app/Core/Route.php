<?php

namespace App\Core;

use Exception;

class Route
{
    private const DEFAULT_CONTROLLER = 'NotFoundController';
    private const DEFAULT_ACTION = 'index';

    private static $routes = [
        '/' => 'IndexController',
        'about' => 'AboutController',
        'contact' => 'ContactController@info',
    ];

    public static function getController(string $route): void
    {
        $route = ($route === '/') ? '/' : trim($route, '/');

        if (array_key_exists($route, self::$routes)) {
            $controller = '\\App\\Controller\\' . self::$routes[$route];
        } else {
            http_response_code(404);
            $controller = '\\App\\Controller\\' . self::DEFAULT_CONTROLLER;
        }

        if (class_exists($controller)) {
            (new $controller())->{self::DEFAULT_ACTION}();
        } else {
            throw new Exception('Class ' . $controller . '.php does not exist');
        }
    }
}
