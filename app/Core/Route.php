<?php

namespace App\Core;

use Exception;

class Route
{
    private const DEFAULT_CONTROLLER = 'NotFoundController';
    private const DEFAULT_ACTION = 'index';

    private static $path;
    private static $routes;

    public static function init(): void
    {
        $path = $_SERVER['PATH_INFO'] ?? $_SERVER['REQUEST_URI'];

        self::$path = ($path === '/') ? '/' : trim($path, '/');
    }

    /**
     * @throws Exception
     */
    public static function run(): void
    {
        if (array_key_exists(self::$path, self::$routes)) {
            $controller = '\\App\\Controller\\' . self::$routes[self::$path];
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

    /**
     * @param array $routes
     */
    public static function setRoutes(array $routes): void
    {
        self::$routes = $routes;
    }
}
