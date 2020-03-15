<?php

namespace App\Core;

class View
{
    public static $templatePath = APP . 'View/';

    /**
     * @param string $template
     * @param array $data
     */
    public static function set(string $template, array $data): void
    {
        extract($data);

        require_once self::$templatePath . $template . '.php';
    }
}
