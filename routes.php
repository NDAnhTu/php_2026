<?php

$router->get("/", "controllers/index.php");
$router->get("/about", "controllers/about.php");
$router->get("/contact", "controllers/contact.php");

$router->get("/notes", "controllers/notes/index.php");
$router->get("/note", "controllers/notes/show.php");
$router->get("/notes/create", "controllers/notes/create.php");
$router->get("/notes/edit", "controllers/notes/edit.php");
$router->patch("/notes/update", "controllers/notes/update.php");
$router->post("/notes/store", "controllers/notes/store.php");
$router->delete("/notes/destroy", "controllers/notes/destroy.php");

$router->get("/register", "controllers/register/index.php")->only("guest");
$router->post("/register", "controllers/register/store.php");
