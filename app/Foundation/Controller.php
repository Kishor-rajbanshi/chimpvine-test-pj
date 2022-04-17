<?php

namespace App\Foundation;

class Controller
{
    /**
     * Application instance
     *
     * @var Application
     */
    protected Application $app;

    /**
     * Construct the controller base class
     */
    public function __construct()
    {
        $this->app = Application::$app;
    }
}
