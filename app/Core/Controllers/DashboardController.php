<?php
namespace App\Core\Controllers;

class DashboardController extends BaseController
{
    public function renderDashboardView()
    {
        // This calls the BaseController's render() by default
        $this->render(__DIR__ . '/../Views/DashboardView.php');
    }
}
