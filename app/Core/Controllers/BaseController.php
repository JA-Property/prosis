<?php
namespace App\Core\Controllers;

class BaseController
{
    /**
     * Renders a view and optionally wraps it in the global layout.
     *
     * @param string $viewFile        Path to the view file.
     * @param array  $data            Data to extract for the view.
     * @param bool   $useGlobalLayout Whether to wrap the view in the global layout.
     */
    protected function render(string $viewFile, array $data = [], bool $useGlobalLayout = true)
    {
        // Extract data for use in the view
        extract($data);
        
        // Render the view content
        ob_start();
        require $viewFile;
        $viewContent = ob_get_clean();
        
        if ($useGlobalLayout) {
            // Pass the view content into a variable used by the global layout
            $content = $viewContent;
            ob_start();
            // Adjust the path to your global layout file as needed.
            require __DIR__ . '/../Views/layouts/global.php';
            echo ob_get_clean();
        } else {
            // Output the view content directly
            echo $viewContent;
        }
    }
}