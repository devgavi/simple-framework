<?php

namespace App\Core;

class Container
{
    private static $instance = null;
    private $objects = [];

    /**
     * Container constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return Container
     */
    public static function getInstance(): Container
    {
        if (self::$instance === null) {
            self::$instance = new self();

            return self::$instance;
        }

        return self::$instance;
    }

    /**
     * @param string $key
     * @return object
     */
    public function get(string $key): object
    {
        return self::$instance->objects[$key];
    }

    /**
     * @param string $key
     * @param object $object
     * @return Container
     */
    public function set(string $key, object $object): Container
    {
        self::$instance->objects[$key] = $object;

        return self::getInstance();
    }

    /**
     *
     */
    private function __clone()
    {
    }

    /**
     *
     */
    private function __wakeup()
    {
    }
}
