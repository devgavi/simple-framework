<?php

namespace App\Core\Cache;

use Exception;
use SplFileInfo;

class File implements CacheInterface
{
    private $cacheDir = ROOT . 'cache/';
    private $suffix = '.cache';
    private $expire = 3600;

    /**
     * @param string $key
     * @return string|null
     * @throws Exception
     */
    public function get(string $key): ?string
    {
        $fileName = $this->cacheDir . $key . $this->suffix;

        if (!file_exists($fileName)) {
            return null;
        }

        if (!is_readable($fileName)) {
            throw new Exception('Cache file is not readable');
        }

        $fileInfo = new SplFileInfo($fileName);

        // when cache file expired
        if (time() > $fileInfo->getMTime() + $this->expire) {
            unlink($fileName);

            return null;
        }

        return file_get_contents($fileName);
    }

    /**
     * @param string $key
     * @param string $data
     * @throws Exception
     */
    public function set(string $key, string $data): void
    {
        if (!is_writeable($this->cacheDir)) {
            throw new Exception('Cache dir is not writeable');
        }

        file_put_contents($this->cacheDir . $key . $this->suffix, $data);
    }

    /**
     * @throws Exception
     */
    public function clear(): void
    {
        if (!is_readable($this->cacheDir)) {
            throw new Exception('Cache dir is not readable');
        }

        $cacheFiles = glob($this->cacheDir . '*' . $this->suffix);

        foreach ($cacheFiles as $file) {
            unlink($file);
        }
    }
}
