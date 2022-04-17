<?php

namespace App\Foundation;

class Session
{
    public function __construct()
    {
        session_start();
    }

    public function get($key)
    {
        return $_SESSION[$key];
    }

    public function store(array $data)
    {
        foreach ($data as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }

    public function remove(...$data)
    {
        foreach ($data as $key) {
            unset($_SESSION[$key]);
        }
    }

    public function handle()
    {
        $this->remove('errors');
    }
}
