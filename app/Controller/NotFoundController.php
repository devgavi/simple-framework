<?php

namespace App\Controller;

use App\Core\View\Simple;

class NotFoundController extends ControllerAbstract
{
    public function index()
    {
        return new Simple('404 controller');
    }
}
