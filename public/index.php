<?php
// public/index.php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

// --------------------------------------------
// 1) Load Environment
// --------------------------------------------
$envPath = __DIR__ . '/../';

if (!file_exists($envPath . '.env')) {
    echo '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Error - Missing .env File</title>
  <style>
    body { font-family: Arial, sans-serif; background-color: #f8d7da; color: #721c24; margin: 2em; }
    .container { border: 1px solid #f5c6cb; padding: 1em; background-color: #f8d7da; border-radius: 5px; }
    h1 { margin-top: 0; }
  </style>
</head>
<body>
  <div class="container">
    <h1>Error: .env File Not Found</h1>
    <p>The application requires a <code>.env</code> file to load environment variables.</p>
    <p>Please create a <code>.env</code> file in the project root (<code>' . $envPath . '.env</code>).</p>
  </div>
</body>
</html>';
    exit;
}

$dotenv = Dotenv::createImmutable($envPath);
$dotenv->load();

// --------------------------------------------
// 2) Build FastRoute Dispatcher
// --------------------------------------------
$dispatcher = simpleDispatcher(function (RouteCollector $r) {
    // 2a) Auto-load all modules' routes.php
    $modulesPath = __DIR__ . '/../app/Modules';
    $modules = scandir($modulesPath);

    foreach ($modules as $module) {
        // Skip . and ..
        if ($module === '.' || $module === '..') {
            continue;
        }

        // If we find a routes.php file in that module, require it
        $routesFile = $modulesPath . '/' . $module . '/routes.php';
        if (file_exists($routesFile)) {
            require $routesFile;  // e.g. "app/Modules/Auth/routes.php"
        }
    }
});

// --------------------------------------------
// 3) Dispatch the current request
// --------------------------------------------
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) from $uri if present
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case \FastRoute\Dispatcher::NOT_FOUND:
        header("HTTP/1.0 404 Not Found");
        echo "404 - Page Not Found";
        break;

    case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        header("HTTP/1.0 405 Method Not Allowed");
        echo "405 - Method Not Allowed";
        break;

    case \FastRoute\Dispatcher::FOUND:
        [$class, $method] = $routeInfo[1];
        $vars = $routeInfo[2];

        // Instantiate the controller
        $controller = new $class();

        // Execute the controller method
        $content = call_user_func_array([$controller, $method], $vars);

        // ----------------------------------------
        // 4) Layout Handling
        // ----------------------------------------
        // If this is the Auth module, we can wrap with an Auth-specific layout.
        // Otherwise, use the global layout. You can detect by namespace or by a property on the controller.
        $namespace = (new \ReflectionClass($controller))->getNamespaceName();
        // e.g. "App\Modules\Auth\Controllers"
        if (strpos($namespace, 'App\\Modules\\Auth') === 0) {
            // Use Auth layout
            echo renderAuthLayout($content);
        } else {
            // Use Global layout
            echo renderGlobalLayout($content);
        }

        break;
}

// --------------------------------------------
// 5) Layout Helper Functions
// --------------------------------------------
function renderAuthLayout($content)
{
    return <<<HTML
<!DOCTYPE html>
<html>
<head>
    <title>Auth Layout</title>
    <style>
        body { font-family: sans-serif; margin: 0; padding: 0; }
        .auth-container { max-width: 600px; margin: 50px auto; border: 1px solid #ccc; padding: 1em; }
    </style>
</head>
<body>
    <div class="auth-container">
        {$content}
    </div>
</body>
</html>
HTML;
}

function renderGlobalLayout($content)
{
    return <<<HTML
<!DOCTYPE html>
<html>
<head>
    <title>Global Layout</title>
    <style>
        body { font-family: sans-serif; margin: 0; padding: 0; }
        header { background: #333; color: #fff; padding: 1em; }
        main { padding: 1em; }
    </style>
</head>
<body>
    <header>
        <h1>Global Layout Header</h1>
    </header>
    <main>
        {$content}
    </main>
</body>
</html>
HTML;
}
