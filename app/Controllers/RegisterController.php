<?php

namespace App\Controllers;

use App\Foundation\Controller;

class RegisterController extends Controller
{
    public function register()
    {
        $this->app->validator->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'password_confirmation' => ['required', 'string']
        ]);//->redirectBack();

        return 'handeling data';
    }
}
