<?php

namespace App\Controller;

abstract class ControllerAbstract
{
    /**
     * @return mixed
     */
    abstract public function index();

    /**
     * @return ControllerAbstract
     */
    public static function create(): ControllerAbstract
    {
        return new static();
    }
}
