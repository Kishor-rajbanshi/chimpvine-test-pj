<?php

namespace App\Foundation;

class Application
{
    //public static Application $app;

    public static string $ROOT_DIR;

    public Request $request;

    public Router $router;

    public Response $response;

    public function __construct($rootDir)
    {
        //self::$app = $this;

        self::$ROOT_DIR = $rootDir;

        $this->request = new Request();

        $this->response = new Response();

        $this->router = new Router($this->request, $this->response);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}
