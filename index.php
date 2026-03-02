<?php
require "functions.php";
require "database.php";
// require "router.php";

$config = require "config.php";

$db = new Database($config['database']);
$posts = $db->query("SELECT * FROM posts")->fetchAll(PDO::FETCH_ASSOC);

dd($posts);
