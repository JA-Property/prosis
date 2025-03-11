<?php

use App\Modules\Students\Controllers\StudentController;
return [
    [
        'method'  => 'GET',
        'path'    => '/students/all',
        'handler' => [StudentController::class, 'renderAllStudentsView']
    ],
];