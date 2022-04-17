<?php

namespace App\Foundation;

class Router
{
    /**
     * Routes for the appliction
     *
     * @var array
     */
    protected array $routes = [];

    /**
     * Construct the router
     *
     * @param Application $app
     * @property Application $app
     */
    public function __construct(private Application $app)
    {
        //
    }

    /**
     * Set get routes
     *
     * @param string $path
     * @param mixed $callback
     * @return void
     */
    public function get(string $path, mixed $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    /**
     * Set post routes
     *
     * @param string $path
     * @param mixed $callback
     * @return void
     */
    public function post(string $path, mixed $callback): void
    {
        $this->routes['post'][$path] = $callback;
    }

    /**
     * Resolve the application
     *
     * @return mixed
     */
    public function resolve(): mixed
    {
        $method = $this->app->request->method();

        $path = $this->app->request->path();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->app->response->statusCode(404);

            return $this->app->view->render('errors/404');
        }

        if (is_string($callback)) {
            return $this->app->view->render($callback);
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }

        return call_user_func($callback);
    }
}
