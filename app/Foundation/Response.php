<?php

namespace App\Foundation;

class Response
{
    /**
     * Set the response status code
     *
     * @param integer $code
     * @return void
     */
    public function statusCode(int $code): void
    {
        http_response_code($code);
    }
}
