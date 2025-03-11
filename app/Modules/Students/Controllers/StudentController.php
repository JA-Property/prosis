<?php
namespace App\Modules\Students\Controllers;

use App\Core\Controllers\BaseController;

class StudentController extends BaseController
{
    public function renderAllStudentsView()
    {
        // Use BaseController's render() to display AllStudents.php with the global layout
        $this->render(__DIR__ . '/../Views/AllStudents.php');
    }
}
