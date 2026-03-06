<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);
$id = $_GET['id'];
$current_user_id = 1;

if (empty($id)) {
    abort();
}

$note = $db->query("SELECT * FROM notes where id = ?", [$id])->findOrFail();

authorize($note['user_id'] === $current_user_id);

view("notes/edit.view.php", [
    "heading" => "Edit Note",
    "note" => $note,
    "errors" => []
]);
