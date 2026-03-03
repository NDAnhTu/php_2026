<?php
$heading = "Create Note";
$config = require "config.php";
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['body'])) {
        $db->query("INSERT INTO notes (body, user_id) VALUES (?, ?)", [$_POST['body'], 1]);
        header("Location: /notes");
        exit;
    }
}

require "views/note_create.view.php";
