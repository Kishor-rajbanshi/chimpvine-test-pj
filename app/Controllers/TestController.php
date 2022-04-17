<?php

namespace App\Controllers;

use App\Foundation\Controller;

class TestController extends Controller
{
    public function index()
    {
        return $this->app->view->render('test', ['name' => 'my anem']);
    }
}
