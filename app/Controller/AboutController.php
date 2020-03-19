<?php

namespace App\Controller;

use App\Core\View\Simple;

class AboutController extends ControllerAbstract
{
    public function index()
    {
        return new Simple('About controller');
    }
}
