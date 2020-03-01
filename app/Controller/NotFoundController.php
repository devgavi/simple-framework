<?php

namespace App\Controller;

use App\Core\BaseController;

class NotFoundController extends BaseController
{
    public function index()
    {
        echo 'Error has been occurred';
    }
}
