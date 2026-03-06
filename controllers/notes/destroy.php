<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$current_user_id = 1;

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $note = $db->query("SELECT * FROM notes WHERE id = ? AND user_id = ?", [$id, $current_user_id])->findOrFail();
    authorize($note['user_id'] === $current_user_id);

    $db->query("DELETE FROM notes WHERE id = ? AND user_id = ?", [$id, $current_user_id]);

    header("Location: /notes");
    exit();
}
