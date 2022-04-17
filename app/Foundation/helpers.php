<?php

if (!function_exists('app')) {
    /**
     * Get application instance
     *
     * @return Application
     */
    function app(): \App\Foundation\Application
    {
        return \App\Foundation\Application::$app;
    }
}

if (!function_exists('view')) {
    /**
     * Get the view instance
     *
     * @return View
     */
    function view(): \App\Foundation\View
    {
        return app()->view;
    }
}
