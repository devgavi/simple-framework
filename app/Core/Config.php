<?php

namespace App\Core;

use Exception;

class Config
{
    private $params = [];

    /**
     * Config constructor.
     * @param string $file
     * @throws Exception
     */
    public function __construct(string $file)
    {
        $file = ROOT . $file;

        if (!file_exists($file)) {
            throw new Exception('Config file does not exist');
        }

        $this->params = parse_ini_file($file);
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getParam(string $key)
    {
        return $this->params[$key];
    }
}
