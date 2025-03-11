<?php

use Modules\Auth\src\Controllers\LoginController;

return [
    [
        'method'  => 'GET',
        'path'    => '/auth/login',
        'handler' => [LoginController::class, 'showLoginForm']
    ],
    [
        'method'  => 'POST',
        'path'    => '/auth/login',
        'handler' => [LoginController::class, 'processLogin']
    ],
    [
        'method'  => 'GET',
        'path'    => '/auth/logout',
        'handler' => [LoginController::class, 'logout']
    ]
];