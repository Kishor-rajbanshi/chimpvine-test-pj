<?php

namespace App\Foundation;

class Request
{
    /**
     * Get the request path
     *
     * @return string
     */
    public function path(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        $position = strpos($path, '?');

        if ($position === false) {
            return $path;
        }

        return substr($path, 0, $position);
    }

    /**
     * Get the request method
     *
     * @return string
     */
    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * Get the request body
     *
     * @return array
     */
    public function body(): array
    {
        $body = [];

        if ($this->method() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }

        if ($this->method() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}
