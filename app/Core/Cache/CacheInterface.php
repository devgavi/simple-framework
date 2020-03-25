<?php

namespace App\Core\Cache;

interface CacheInterface
{
    /**
     * @param string $key
     * @return string|null
     */
    public function get(string $key): ?string;

    /**
     * @param string $key
     * @param string $data
     */
    public function set(string $key, string $data): void;

    /**
     *
     */
    public function clear(): void;
}
