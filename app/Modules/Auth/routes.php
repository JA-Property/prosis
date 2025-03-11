<?php

use App\Modules\Auth\Controllers\LoginController;
return [
    
    [
        'method'  => 'GET',
        'path'    => '/menu',
        'handler' => [MenuController::class, 'getMenu']
    ],
    [
        'method'  => 'GET',
        'path'    => '/auth/login',
        'handler' => [LoginController::class, 'renderLoginFormView']
    ],
];