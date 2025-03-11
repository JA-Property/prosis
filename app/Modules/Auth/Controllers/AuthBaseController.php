<?php
namespace App\Modules\Auth\Controllers;

use App\Core\Controllers\BaseController;

class AuthBaseController extends BaseController
{
    protected string $authLayoutPath = __DIR__ . '/../Views/Layouts/GlobalAuthLayout.php';

    protected function render(
        string $viewFile,
        array $data = [],
        bool $useGlobalLayout = true,
        string $layoutFile = __DIR__ . '/../Views/Layouts/GlobalAuthLayout.php' // same default type as parent
    ) {
        // Always use the Auth layout instead of the default
        parent::render($viewFile, $data, $useGlobalLayout, $this->authLayoutPath);
    }
}
