<?php

$router->get("/", "index.php");
$router->get("/about", "about.php");
$router->get("/contact", "contact.php");

$router->get("/notes", "notes/index.php")->only("auth");
$router->get("/note", "notes/show.php");
$router->get("/notes/create", "notes/create.php");
$router->get("/notes/edit", "notes/edit.php");
$router->patch("/notes/update", "notes/update.php");
$router->post("/notes/store", "notes/store.php");
$router->delete("/notes/destroy", "notes/destroy.php");

$router->get("/register", "register/index.php")->only("guest");
$router->post("/register", "register/store.php")->only("guest");

$router->get("/login", "auth/index.php")->only("guest");
$router->post("/login", "auth/authenticate.php")->only("guest");
$router->delete("/logout", "auth/logout.php")->only("auth");
