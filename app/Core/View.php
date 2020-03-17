<?php

namespace App\Core;

class View
{
    public static $templateDir = APP . 'View/';

    /**
     * @param string $template
     * @param array $data
     * @return string
     */
    public static function set(string $template, array $data): string
    {
        extract($data);

        require_once self::$templateDir . $template . '.php';

        return ob_get_clean();
    }
}
