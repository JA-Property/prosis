<?php
// Autoload dependencies (make sure vendor/autoload.php exists)
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$envPath = __DIR__ . '/../'; // Assuming .env is in the project root

// Check if the .env file exists
if (!file_exists($envPath . '.env')) {
    // Display a pretty error message if .env does not exist
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

// Load environment variables
$dotenv = Dotenv::createImmutable($envPath);
$dotenv->load();

// Display "index" and all key/value pairs from the .env file
echo "<h1>index</h1>";
echo "<ul>";
foreach ($_ENV as $key => $value) {
    echo "<li><strong>{$key}:</strong> {$value}</li>";
}
echo "</ul>";
?>
