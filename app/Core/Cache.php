<?php

namespace App\Core;

use App\Core\Cache\CacheInterface;
use Exception;

class Cache
{
    /**
     * @param string $type
     * @return CacheInterface
     * @throws Exception
     */
    public static function create(string $type): CacheInterface
    {
        $className = '\\App\\Core\\Cache\\' . ucfirst($type);

        if (!class_exists($className)) {
            throw new Exception('Cache driver does not exist');
        }

        return new $className();
    }
}
