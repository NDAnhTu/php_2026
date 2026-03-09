<?php

use Core\Session;

view("auth/index.view.php", [
    'errors' => Session::get('errors') ?? []
]);
