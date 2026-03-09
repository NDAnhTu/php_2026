<?php

use Core\Database;
use Core\App;
use Core\Validator;

$db = App::resolve(Database::class);
$id = $_POST['id'];
$body = $_POST['body'];
$current_user_id = $_SESSION['user']['id'] ?? null;
$maxLength = 1000;

$note = $db->query("SELECT * FROM notes where id = ?", [$id])->findOrFail();
$note['body'] = $body;
authorize($note['user_id'] === $current_user_id);

if (! Validator::string($body, 1, $maxLength)) {
    $errors['body'] = "Body is empty or too long (max $maxLength characters)";
}

if (! empty($errors)) {
    return view("notes/edit.view.php", [
        "heading" => "Edit Note",
        "errors" => $errors,
        "note" => $note
    ]);
}

if (empty($errors)) {
    $db->query("UPDATE notes set body = :body WHERE id = :id", [
        'body' => $body,
        'id' => $id
    ]);
    header("Location: /notes");
    exit;
}
