<?php
namespace App\Controllers; // or Core\Controllers, up to you

class DashboardController
{
    public function renderDashboardView()
    {
        echo "Welcome to the Dashboard!";
        // or $this->render('path/to/dashboard/view.php');
    }
}
