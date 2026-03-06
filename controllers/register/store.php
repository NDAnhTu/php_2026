<?php

use Core\Database;
use Core\Validator;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];
$password_confirmation = $_POST['password_confirmation'];
$errors = [];
$db = App::resolve(Database::class);

if (! Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (! Validator::string($name, 2, 255)) {
    $errors['name'] = 'Name must be at least 2 characters long.';
}

if (! Validator::string($password, 7, 255)) {
    $errors['password'] = 'Password must be at least 7 characters long.';
}

if ($password !== $password_confirmation) {
    $errors['password_confirmation'] = 'Password confirmation does not match.';
}

if (! empty($errors)) {
    return view('register/index.view.php', [
        'errors' => $errors
    ]);
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    $_SESSION['user'] = [
        'email' => $email
    ];
    header('location: /');
    exit();
} else {
    $result = $db->query('INSERT INTO users(name, admin, email, password) values(:name, :admin, :email, :password)', [
        'name' => $email,
        'admin' => 0,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ]);
    if ($result) {
        $_SESSION['user'] = [
            'email' => $email,
            'name' => $name
        ];
    }
    header('location: /');
    exit();
}
