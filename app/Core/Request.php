<?php

namespace App\Core;

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
     * @param string $key
     * @return string
     */
    public static function get(string $key): string
    {
        return self::prepare($_GET[$key]);
    }

    /**
     * @param string $key
     * @return string
     */
    public static function post(string $key): string
    {
        return self::prepare($_POST[$key]);
    }
}
