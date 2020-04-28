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
        $file = __DIR__ . '/../../' . $file;

        if (!file_exists($file)) {
            throw new Exception('Config file does not exist');
        }

        $this->params = parse_ini_file($file, true);
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->params;
    }

    /**
     * @param string $key
     * @return mixed
     * @throws Exception
     */
    public function get(string $key)
    {
        $keyParts = explode('.', $key);

        if (count($keyParts) !== 2) {
            throw new Exception('Config key is wrong');
        }

        return $this->params[$keyParts[0]][$keyParts[1]];
    }
}
