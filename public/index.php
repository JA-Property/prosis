<?php
// public/index.php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

use App\Core\Router;

/**
 * ------------------------------------------------------
 *  1) Load environment variables (if install.lock exists)
 *     or redirect user to setup/repair
 * ------------------------------------------------------
 */
$envPath         = __DIR__ . '/../';
$envFile         = $envPath . '.env';
$installLockFile = $envPath . 'install.lock';
$currentPath     = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// If install.lock does not exist => system not installed => go to /setup
if (!file_exists($installLockFile)) {
    if ($currentPath !== '/setup') {
        header('Location: /setup');
        exit;
    }
    // Let /setup handle .env creation
} else {
    // install.lock exists => check for .env
    if (!file_exists($envFile)) {
        // .env missing => system is broken => go to repair
        if ($currentPath !== '/repair') {
            header('Location: /repair');
            exit;
        }
        // else user is already on /repair
    } else {
        // We have both install.lock and .env => load environment
        $dotenv = Dotenv::createImmutable($envPath);

        // If you want to fail early if certain env vars are missing:
        $dotenv->load();
        // Optional: require certain variables (Dotenv v5.x syntax)
        // If missing or empty, it will throw a RuntimeException
        $dotenv->required([
            'DB_HOST',
            'DB_DATABASE',
            'DB_USERNAME'
        ])->notEmpty();

        // Alternatively, do your own checks if you want custom error handling:
        // if (empty($_ENV['DB_HOST'])) {
        //     die("DB_HOST is missing in .env!");
        // }
    }
}

/**
 * ------------------------------------------------------
 *  2) (Optional) Start Session
 * ------------------------------------------------------
 */
session_start();

// If you want to simulate a logged-in user:
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = [
        'id'       => 1,
        'username' => 'testuser',
        'role'     => 'admin'
    ];
}

/**
 * ------------------------------------------------------
 *  3) Configure Eloquent Capsule (only if .env is loaded)
 * ------------------------------------------------------
 */
if (file_exists($envFile)) {
    $capsule = new Capsule;

    $capsule->addConnection([
        'driver'    => $_ENV['DB_DRIVER']    ?? 'mysql',
        'host'      => $_ENV['DB_HOST'],
        'database'  => $_ENV['DB_DATABASE'],
        'username'  => $_ENV['DB_USERNAME'],
        'password'  => $_ENV['DB_PASSWORD'] ?? '',  // if blank is valid, this is fine
        'charset'   => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix'    => '',
    ]);
    

    // Set the event dispatcher (necessary for Eloquent model events)
    $capsule->setEventDispatcher(new Dispatcher(new Container));

    // Make this Capsule instance available globally via static methods
    $capsule->setAsGlobal();

    // Boot Eloquent
    $capsule->bootEloquent();
}

/**
 * ------------------------------------------------------
 *  4) Check if user must be logged in to access the route
 * ------------------------------------------------------
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
 * ------------------------------------------------------
 *  5) Dispatch your router
 * ------------------------------------------------------
 */
$router = new Router(__DIR__ . '/../app/Modules');
$router->dispatch();
