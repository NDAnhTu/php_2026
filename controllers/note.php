<?php

$config = require "config.php";
$db = new Database($config['database']);
$heading = "Note";
$id = $_GET['id'];
$current_user_id = 1;

if (empty($id)) {
    abort();
}

$note = $db->query("SELECT * FROM notes where id = ?", [$id])->findOrFail();

authorize($note['user_id'] === $current_user_id);

require "views/note.view.php";
