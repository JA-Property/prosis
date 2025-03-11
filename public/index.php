<?php
// public/index.php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Core\Router;

session_start();

// ------------------------------
// Simulate a logged-in user
// ------------------------------
if (!isset($_SESSION['user'])) {
    // This simulates a user object; adjust properties as needed.
    $_SESSION['user'] = [
        'id'       => 1,
        'username' => 'testuser',
        'role'     => 'admin'
    ];
}


$envPath         = __DIR__ . '/../';
$envFile         = $envPath . '.env';
$installLockFile = $envPath . 'install.lock';
$currentPath     = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

/**
 * 1) If install.lock *exists*:
 *    - Check .env
 *      - if .env is missing, go to /repair (unless already there)
 *      - if .env is found, load it
 */
if (file_exists($installLockFile)) {
    if (!file_exists($envFile)) {
        // .env is missing => system is broken => go to repair
        if ($currentPath !== '/repair') {
            header('Location: /repair');
            exit;
        }
        // else user is already at /repair, do NOT redirect again
    } else {
        // We have both install.lock and .env => load environment
        $dotenv = Dotenv::createImmutable($envPath);
        $dotenv->load();
    }
} else {
    /**
     * 2) If install.lock *does not* exist => system is not installed => go to /setup
     *    - but only if not already on /setup
     */
    if ($currentPath !== '/setup') {
        header('Location: /setup');
        exit;
    }
    // else user is already at /setup, no redirect
}

/**
 * 3) Optional “logged‐in” check for non‐public paths
 */
$publicPaths = [
    '/setup',
    '/repair',
    '/auth/login',
    '/auth/logout',
    '/',
    // etc.
];

if (!isset($_SESSION['user']) && !in_array($currentPath, $publicPaths, true)) {
    header('Location: /auth/login');
    exit;
}

/**
 * 4) Dispatch your router
 */
$router = new Router(__DIR__ . '/../app/Modules');
$router->dispatch();
