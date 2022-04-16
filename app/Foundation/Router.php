<?php

namespace App\Foundation;

class Router
{
    protected array $routes = [];

    public function __construct(private Request $request, private Response $response)
    {
        //
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $method = $this->request->getMethod();

        $path = $this->request->getPath();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setStatusCode(404);
            return 'Not Found';
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }

    private function renderView($view)
    {
        $layoutContent = $this->layoutContent();

        $viewContent = $this->viewContent($view);

        return str_replace('{{ content }}', $viewContent, $layoutContent);
    }

    private function layoutContent()
    {
        ob_start();

        include_once Application::$ROOT_DIR . "/resources/views/layouts/app.php";

        return ob_get_clean();
    }

    private function viewContent($view)
    {
        ob_start();

        include_once Application::$ROOT_DIR . "/resources/views/{$view}.php";

        return ob_get_clean();
    }
}
