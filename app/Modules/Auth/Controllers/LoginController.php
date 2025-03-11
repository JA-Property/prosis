<?php

namespace App\Modules\Auth\Controllers;

class LoginController extends AuthBaseController
{
    public function renderLoginFormView()
    {
        // This will use your "Auth" layout instead of the default:
        $this->render(__DIR__ . '/../Views/Login.php');
    }
}
