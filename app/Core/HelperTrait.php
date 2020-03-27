<?php

namespace App\Core;

trait HelperTrait
{
    /**
     * @param string $key
     * @return object
     */
    public function container(string $key): object
    {
        return Container::getInstance()->get($key);
    }
}
