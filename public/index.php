<?php

use Core\Session;

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "core/functions.php";

spl_autoload_register(function ($class) {
    // Core\Database
    require base_path(str_replace('\\', DIRECTORY_SEPARATOR, $class) . ".php");
});

$router = new Core\Router();

$routes = require base_path("routes.php");

require base_path("bootstrap.php");

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

// $_SESSION['_flash'] = [];
Session::unflash();
