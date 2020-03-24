<?php

namespace App\Core;

use Exception;

class Request
{
    /**
     * @param string $data
     * @return string
     */
    private static function prepare(string $data): string
    {
        return htmlspecialchars($data);
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed|string
     * @throws Exception
     */
    public static function __callStatic(string $name, array $arguments)
    {
        $allowedKeys = [
            'get',
            'post',
            'session',
            'cookie',
            'server',
        ];

        if (!in_array($name, $allowedKeys)) {
            throw new Exception('Unsupported request key');
        }

        if (!is_string($arguments[0])) {
            throw new Exception('Argument passed to method must be string');
        }

        switch ($name) {
            case 'get':
                return self::prepare($_GET[$arguments[0]]);
                break;
            case 'post':
                return self::prepare($_POST[$arguments[0]]);
                break;
            case 'session':
                return self::prepare($_SESSION[$arguments[0]]);
                break;
            case 'cookie':
                return self::prepare($_COOKIE[$arguments[0]]);
                break;
            default:
                return $_SERVER[$arguments[0]];
        }
    }
}
