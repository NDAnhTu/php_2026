<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "functions.php";

spl_autoload_register(function ($class) {
    // require base_path("database.php");
    // require base_path("response.php");
    require base_path("core/" . strtolower($class) . ".php");
});

require base_path("router.php");
