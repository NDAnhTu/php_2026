<?php

require "validator.php";
$heading = "Create Note";
$config = require "config.php";
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    $maxLength = 1000;

    if (! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = "Body is empty or too long (max $maxLength characters)";
    }

    if (empty($errors)) {
        $db->query("INSERT INTO notes (body, user_id) VALUES (?, ?)", [$_POST['body'], 1]);
        header("Location: /notes");
        exit;
    }
}

require "views/notes/create.view.php";
