<?php

use Core\Session;
use Core\ValidationException;

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "core/functions.php";

require BASE_PATH . "vendor/autoload.php";

// spl_autoload_register(function ($class) {
//     // Core\Database
//     require base_path(str_replace('\\', DIRECTORY_SEPARATOR, $class) . ".php");
// });

$router = new Core\Router();

$routes = require base_path("routes.php");

require base_path("bootstrap.php");

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


try {
    $router->route($uri, $method);
} catch (ValidationException $e) {
    Session::flash('errors', $e->errors);
    Session::flash('old', $e->old);
    redirect($_SERVER['HTTP_REFERER'] ?? '/');
}

// $_SESSION['_flash'] = [];
Session::unflash();
