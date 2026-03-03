<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "core/functions.php";

spl_autoload_register(function ($class) {
    // Core\Database
    require base_path(str_replace('\\', DIRECTORY_SEPARATOR, $class) . ".php");
});

require base_path("core/router.php");
