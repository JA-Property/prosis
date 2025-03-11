<?php
// public/index.php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Core\Router;

// Start PHP session (to check if user is logged in).
session_start();

// 1) Paths to .env and install.lock in the project root
$envPath         = __DIR__ . '/../';
$envFile         = $envPath . '.env';
$installLockFile = $envPath . 'install.lock';

// 2) If .env does not exist => we must do initial setup
if (!file_exists($envFile)) {
    // For example, redirect to a setup route:
    header('Location: /setup');
    exit;
}

// 3) If install.lock does not exist => system is not installed => also do setup
if (!file_exists($installLockFile)) {
    header('Location: /setup');
    exit;
}

// 4) If we do have .env & install.lock, we might still want to check 
//    if the system is in “repair” mode. You could do that here if needed.
//    e.g. if file_exists($repairModeFile) { header('Location: /repair'); exit; }

// 5) Now load .env
$dotenv = Dotenv::createImmutable($envPath);
$dotenv->load();

// 6) Check if user is logged in. If not, redirect to /auth/login 
//    unless the requested path is "public" (like /setup, /repair, /auth/login).
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Define which paths do not require a logged-in user:
$publicPaths = [
    '/setup',
    '/repair',
    '/auth/login',
    '/auth/logout',
    '/',         // Maybe you want your home page to be public.
    // etc.
];

// If no user session AND the path is not in the "public" list => send to login
if (
    !isset($_SESSION['user']) 
    && !in_array($currentPath, $publicPaths, true)
) {
    header('Location: /auth/login');
    exit;
}

// 7) Finally, instantiate & dispatch your router
$router = new Router(__DIR__ . '/../app/Modules');
$router->dispatch();
