<?php

use Core\Database;
use Core\Validator;

$config = require base_path("config.php");
$db = new Database($config['database']);
$errors = [];
$maxLength = 1000;

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "Body is empty or too long (max $maxLength characters)";
}

if (! empty($errors)) {
    return view("notes/create.view.php", [
        "heading" => "Create Note",
        "errors" => $errors
    ]);
}

if (empty($errors)) {
    $db->query("INSERT INTO notes (body, user_id) VALUES (?, ?)", [$_POST['body'], 1]);
    header("Location: /notes");
    exit;
}
