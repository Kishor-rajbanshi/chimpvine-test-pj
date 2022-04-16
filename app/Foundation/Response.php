<?php

namespace App\Foundation;

class Response
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }
}
