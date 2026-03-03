<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config['database']);
$id = $_GET['id'];
$current_user_id = 1;

if (empty($id)) {
    abort();
}

$note = $db->query("SELECT * FROM notes where id = ?", [$id])->findOrFail();

authorize($note['user_id'] === $current_user_id);

view("notes/show.view.php", [
    "heading" => "Note",
    "note" => $note
]);
