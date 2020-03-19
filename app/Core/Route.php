<?php

namespace App\Core;

use Throwable;

class Route
{
    /**
     * @param string $route
     * @param callable $function
     */
    public static function get(string $route, callable $function): void
    {
        if (!self::checkMethod('GET')) {
            return;
        }

        if (!self::matchRoute($route)) {
            return;
        }

        $result = $function();

        if (is_array($result)) {
            self::dispatch($result[0], $result[1]);
        } else {
            $function();
        }

        exit();
    }

    /**
     * @param string $method
     * @return bool
     */
    private static function checkMethod(string $method): bool
    {
        return $_SERVER['REQUEST_METHOD'] === strtoupper($method);
    }

    /**
     * @param string $route
     * @return bool
     */
    private static function matchRoute(string $route): bool
    {
        preg_match('/[\w]+/', $_SERVER['REQUEST_URI'], $matches);

        if (empty($matches[0])) {
            $path = '/';
        } else {
            $path = $matches[0];
        }

        return $route === $path;
    }

    /**
     * @param string $controller
     * @param string $action
     */
    public static function dispatch(string $controller, string $action): void
    {
        try {
            $content = (new $controller())->{$action}();

            echo new Response($content);
        } catch (Throwable $e) {
            echo $e->getMessage();
        }
    }
}
