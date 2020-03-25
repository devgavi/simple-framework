<?php

namespace App\Core;

class Container
{
    private $objects = [];

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->objects[$key];
    }

    /**
     * @param string $key
     * @param $object
     * @return Container
     */
    public function set(string $key, $object): Container
    {
        $this->objects[$key] = $object;

        return $this;
    }
}
