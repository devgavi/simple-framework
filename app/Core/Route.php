<?php

namespace App\Core;

use Exception;

class Route
{
    /**
     * @param string $name
     * @param array $arguments
     * @throws Exception
     */
    public static function __callStatic(string $name, array $arguments): void
    {
        $allowedMethods = [
            'GET',
            'POST',
            'PUT',
            'DELETE',
        ];

        if (!in_array(strtoupper($name), $allowedMethods)) {
            throw new Exception('Unsupported request method');
        }

        if (!self::checkMethod(strtoupper($name))) {
            throw new Exception('Real request method is wrong');
        }

        [$route, $callback] = $arguments;

        if (!self::matchRoute($route)) {
            return;
        }

        $result = call_user_func($callback);

        if (is_array($result)) {
            self::dispatch($result[0], $result[1]);
        } else {
            echo new Response($result);
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
        return $route === self::getPath();
    }

    /**
     * @return string
     */
    public static function getPath(): string
    {
        preg_match('/[\w]+/', $_SERVER['REQUEST_URI'], $matches);

        return (empty($matches[0])) ? '/' : $matches[0];
    }

    /**
     * @param string $controller
     * @param string $action
     */
    public static function dispatch(string $controller, string $action): void
    {
        try {
            $className = '\\App\\Controller\\' . $controller;
            $content = (new $className)::create()->$action();

            echo new Response($content);
        } catch (Exception $e) {
            echo $e->__toString();
        }
    }
}
