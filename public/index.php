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
use Core\Router;

// 1) Instantiate our Router
$router = new Router(__DIR__ . '/../modules');

// 2) Dispatch the current request
$router->dispatch();