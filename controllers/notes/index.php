<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);
$user_id = $_SESSION['user']['id'] ?? null;

$notes = $db->query("SELECT * FROM notes where user_id = ?", [$user_id])->getAll();

view("notes/index.view.php", [
    "heading" => "Notes Page",
    "notes" => $notes
]);
