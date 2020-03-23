<?php

namespace App\Core;

use Exception;

class Template
{
    private $data;

    /**
     * Template constructor.
     * @param string $template
     * @param array $data
     * @throws Exception
     */
    public function __construct(string $template, array $data)
    {
        if (!$this->templateExists($template)) {
            throw new Exception('Template file does not exist');
        }

        extract($data, EXTR_OVERWRITE);

        ob_start();

        require_once APP . 'View/' . $template . '.php';

        $this->data = ob_get_clean();
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $template
     * @return bool
     */
    private function templateExists(string $template): bool
    {
        return file_exists(APP . 'View/' . $template . '.php');
    }
}
