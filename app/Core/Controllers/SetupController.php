<?php
namespace App\Core\Controllers;

class SetupController extends BaseController
{
    public function renderSetupLandingView()
    {
        // This calls the BaseController's render() by default
        $this->render(__DIR__ . '/../Views/Setup/LandingView.php');
    }
}
