<?php

use App\Modules\Admin\Controllers\AdminMenuController;
use App\Modules\Admin\Controllers\SchoolController;
return [
    [
        'method'  => 'GET',
        'path'    => '/admin/menu',
        'handler' => [AdminMenuController::class, 'renderAllMenuOptions']
    ],
    [
        'method'  => 'GET',
        'path'    => '/admin/menu/options',
        'handler' => [AdminMenuController::class, 'renderAllMenuOptions']
    ],
    [
        'method'  => 'GET',
        'path'    => '/admin/schools/all',
        'handler' => [SchoolController::class, 'index']
    ],
    [
        'method'  => 'GET',
        'path'    => '/admin/schools/create',
        'handler' => [SchoolController::class, 'create']
    ],
];