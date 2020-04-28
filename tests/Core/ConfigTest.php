<?php

use App\Core\Config;
use PHPUnit\Framework\TestCase as PHPUnit_Framework_TestCase;

class ConfigTest extends PHPUnit_Framework_TestCase
{
    protected function init()
    {
        return new Config('config.ini');
    }

    public function testGetAll()
    {
        $config = $this->init();
        $this->assertIsArray($config->getAll());
    }

    public function testGet()
    {
        $config = $this->init();
        $this->assertContainsEquals($config->get('cache.type'), ['file']);
    }
}
