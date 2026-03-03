<?php

$config = require "config.php";
$db = new Database($config['database']);
$heading = "Notes Page";

$notes = $db->query("SELECT * FROM notes where user_id = ?", [1])->getAll();

require "views/notes/index.view.php";
