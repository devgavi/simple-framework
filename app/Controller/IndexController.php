<?php

namespace App\Controller;

use App\Core\Template;

class IndexController extends ControllerAbstract
{
    public function index()
    {
        $data['welcome'] = 'Welcome message';

        return new Template('index', $data);
    }
}
