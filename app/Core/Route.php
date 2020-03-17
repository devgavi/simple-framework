<?php

namespace App\Core;

use Throwable;

class Route
{
    /**
     * @param string $route
     * @param $function
     */
    public static function get(string $route, $function): void
    {
        if (!self::checkMethod('GET')) {
            return;
        }

        if (!self::matchRoute($route)) {
            return;
        }

        if (is_array($function)) {
            self::dispatch($function[0], $function[1]);
        } else {
            call_user_func($function);
        }

        exit();
    }

    /**
     * @param string $method
     * @return bool
     */
    private static function checkMethod(string $method): bool
    {
        if ($_SERVER['REQUEST_METHOD'] === strtoupper($method)) {
            return true;
        } else {
            return false;
        }
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

        if ($route === $path) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $controller
     * @param string $action
     */
    public static function dispatch(string $controller, string $action): void
    {
        try {
            $content = (new $controller())->{$action}();

            $response = new Response();
            $response->setContent($content);

            echo $response->getContent();
        } catch (Throwable $e) {
            echo $e->getMessage();
        }
    }
}
