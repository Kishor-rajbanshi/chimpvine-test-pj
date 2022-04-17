<?php

namespace App\Foundation;

class Application
{
    /**
     * Application instance
     *
     * @var Application
     */
    public static Application $app;

    /**
     * Request instance
     *
     * @var Request
     */
    public Request $request;

    /**
     * Response instance
     *
     * @var Response
     */
    public Response $response;

    /**
     * View instance
     *
     * @var View
     */
    public View $view;

    /**
     * Router instance
     *
     * @var Router
     */
    public Router $router;

    /**
     * Validator instance
     *
     * @var Validator
     */
    public Validator $validator;

    /**
     * Session instance
     *
     * @var Session
     */
    public Session $session;

    /**
     * Construct the application
     *
     * @param string $rootDir
     * @property string $rootDir
     */
    public function __construct(public string $rootDir)
    {
        self::$app = $this;

        $this->session = new Session();

        $this->request = new Request();

        $this->response = new Response();

        $this->view = new View($this);

        $this->router = new Router($this);

        $this->validator = new Validator($this);
    }

    /**
     * Run the application
     *
     * @return void
     */
    public function run(): void
    {
        require_once $this->rootDir . '/routes/web.php';

        echo $this->router->resolve();

        $this->session->handle();
    }
}
