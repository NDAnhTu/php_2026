<?php

view("index.view.php", [
    "heading" => "Home Page",
    "name" => $_SESSION["user"]['name'] ?? null
]);
