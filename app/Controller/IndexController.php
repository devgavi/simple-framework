<?php

namespace App\Controller;

use App\Core\View;

class IndexController extends ControllerAbstract
{
    public function index()
    {
        $data['welcome'] = 'Welcome message';

        return View::set('index', $data);
    }
}
