<?php
require "functions.php";
require "database.php";
// require "router.php";

$config = require "config.php";

$id = $_GET['id'] ?? null;
$query = "SELECT * FROM posts WHERE id = :id";

$db = new Database($config['database']);
$posts = $db->query($query, ['id' => $id])->fetchAll(PDO::FETCH_ASSOC);

dd($posts);
