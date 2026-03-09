<?php

use Core\Database;
use Core\Validator;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];
$db = App::resolve(Database::class);

if (! Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (! Validator::string($password, 7, 255)) {
    $errors['password'] = 'Password must be at least 7 characters long.';
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login($user);
        header('location: /');
        exit();
    }
} else {
    $errors['password'] = 'Wrong email or password.';
}

if (! empty($errors)) {
    return view('auth/index.view.php', [
        'errors' => $errors
    ]);
}
