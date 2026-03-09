<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);
$id = $_GET['id'];
$current_user_id = $_SESSION['user']['id'] ?? null;

if (empty($id)) {
    abort();
}

$note = $db->query("SELECT * FROM notes where id = ?", [$id])->findOrFail();

authorize($note['user_id'] === $current_user_id);

view("notes/show.view.php", [
    "heading" => "Note",
    "note" => $note
]);
