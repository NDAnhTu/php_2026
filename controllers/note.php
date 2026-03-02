<?php

$config = require "config.php";
$db = new Database($config['database']);
$heading = "Note";
$id = $_GET['id'];

if (!empty($id)) {
    $note = $db->query("SELECT * FROM notes where id = ?", [$id])->fetch();
    if (!$note) {
        abort();
    }
} else {
    abort();
}

require "views/note.view.php";
