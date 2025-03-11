<?php
namespace App\Core\Controllers;

class BaseController
{
    protected function render(
        string $viewFile, 
        array $data = [], 
        bool $useGlobalLayout = true, 
        string $layoutFile = __DIR__ . '/../Views/Layouts/GlobalLayout.php'
    ) {
        // Extract data
        extract($data);

        // Render the view content
        ob_start();
        require $viewFile;
        $viewContent = ob_get_clean();

        // If $useGlobalLayout, wrap in chosen $layoutFile
        if ($useGlobalLayout && file_exists($layoutFile)) {
            $content = $viewContent;
            ob_start();
            require $layoutFile;
            echo ob_get_clean();
        } else {
            // Output the view content directly
            echo $viewContent;
        }
    }
}
