<?php

use Core\Database;
use Core\Validator;
use Core\App;

$db = App::resolve(Database::class);
$errors = [];
$maxLength = 1000;
$current_user_id = $_SESSION['user']['id'] ?? null;

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
    $db->query("INSERT INTO notes (body, user_id) VALUES (?, ?)", [$_POST['body'], $current_user_id]);
    header("Location: /notes");
    exit;
}
