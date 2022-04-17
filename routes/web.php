<?php

use App\Controllers\RegisterController;

app()->router->get('/', function () {
    echo 'Welcome';
});

app()->router->get('/register', 'register');
app()->router->post('/register', [RegisterController::class, 'register']);

app()->router->get('/login', 'login');
