<?php

namespace App\Foundation;

class View
{
    /**
     * Construct the view
     *
     * @param Application $app
     * @property Applicaion $app
     */
    public function __construct(private Application $app)
    {
        //
    }

    /**
     * Render the view
     *
     * @param string $view
     * @param array $params
     * @return string
     */
    public function render(string $view, array $params = []): string
    {
        //$layoutContent = $this->layoutContent();

        return $content = $this->content($view, $params);

        //return str_replace('{{ content }}', $content, $layoutContent);
    }

    /**
     * Get layout content
     *
     * @return string
     */
    /* private function layoutContent(): string
    {
        ob_start();

        include_once $this->app->rootDir . "/resources/views/layouts/app.php";

        return ob_get_clean();
    } */

    /**
     * Get view content
     *
     * @param string $view
     * @param array $params
     * @return string
     */
    private function content(string $view, array $params): string
    {
        // ob_start();

        $errors = $this->app->session->get('errors');

        foreach ($params as $key => $value) {
            $$key = $value;
        }

        include_once $this->app->rootDir . "/resources/views/{$view}.php";

        return ob_get_clean();
    }
}
