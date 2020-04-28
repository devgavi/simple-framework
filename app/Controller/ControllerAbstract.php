<?php

namespace App\Controller;

use App\Core\HelperTrait;

abstract class ControllerAbstract
{
    use HelperTrait;

    /**
     * @return mixed
     */
    abstract public function index();
}
