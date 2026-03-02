<?php
require "functions.php";
// require "router.php";

$dsn = "mysql:host=127.0.0.1;port=3306;dbname=myapp;charset=utf8mb4";
$pdo = new PDO($dsn, 'root');

$stament = $pdo->prepare("SELECT * FROM posts");
$stament->execute();
$posts = $stament->fetchAll(PDO::FETCH_ASSOC);

dd($posts);
