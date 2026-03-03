<?php
$heading = "Create Note";
$config = require "config.php";
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    $maxLength = 1000;

    if (empty($_POST['body'])) {
        $errors['body'] = "Body is required";
    }

    if (strlen($_POST['body']) > $maxLength) {
        $errors['body'] = "Body must be less than 1000 characters";
    }

    if (empty($errors)) {
        $db->query("INSERT INTO notes (body, user_id) VALUES (?, ?)", [$_POST['body'], 1]);
        header("Location: /notes");
        exit;
    }
}

require "views/note_create.view.php";
