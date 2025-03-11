<?php
namespace App\Core\Controllers;

class RepairController extends BaseController
{
    public function renderRepairModeLandingView()
    {
        // This calls the BaseController's render() by default
        $this->render(__DIR__ . '/../Views/Repair/LandingView.php');
    }
}
