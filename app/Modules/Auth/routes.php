<?php

use App\Modules\Auth\Controllers\LoginController;
return [
    [
        'method'  => 'GET',
        'path'    => '/auth/login',
        'handler' => [LoginController::class, 'renderLoginFormView']
    ],
];