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
        // Extract data for the view
        extract($data);

        // Render the view file's raw content
        ob_start();
        require $viewFile;
        $viewContent = ob_get_clean();

        // If using a layout, embed the view content in that layout
        if ($useGlobalLayout && file_exists($layoutFile)) {
            $content = $viewContent;  // pass $viewContent into $content
            ob_start();
            require $layoutFile;      // e.g. global layout
            echo ob_get_clean();
        } else {
            // Otherwise, output the view content directly
            echo $viewContent;
        }
    }
}
