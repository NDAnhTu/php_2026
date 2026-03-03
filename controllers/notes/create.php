<?php

require base_path("core/validator.php");

view("notes/create.view.php", [
    "heading" => "Create Note",
    "errors" => []
]);
