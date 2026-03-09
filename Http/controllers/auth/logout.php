<?php

use Core\Authenticator;

$authenticator = new Authenticator();
$authenticator->logout();

header('Location: /login');
die();
