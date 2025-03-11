<?php

use App\Core\Controllers\DashboardController;

return [
    [
        'method'  => 'GET',
        'path'    => '/',
        'handler' => [DashboardController::class, 'renderDashboardView']
    ],
    [
        'method'  => 'GET',
        'path'    => '/dashboard',
        'handler' => [DashboardController::class, 'renderDashboardView']
    ]
];

