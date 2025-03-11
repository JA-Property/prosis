<?php

use App\Core\Controllers\DashboardController;
use App\Core\Controllers\SetupController;
use App\Core\Controllers\RepairController;

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
    ],
    [
        'method'  => 'GET',
        'path'    => '/setup',
        'handler' => [SetupController::class, 'renderSetupLandingView']
    ],
    [
        'method'  => 'GET',
        'path'    => '/repair',
        'handler' => [RepairController::class, 'renderRepairModeLandingView']
    ]
];

