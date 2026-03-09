<?php

use Core\Database;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];
$db = App::resolve(Database::class);
$form = new Http\Forms\LoginForm();

if (! $form->validate($email, $password)) {
    $errors = $form->getErrors();
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login($user);
        header('location: /');
        exit();
    } else {
        $errors['password'] = 'Wrong email or password.';
    }
} else {
    $errors['password'] = 'Wrong email or password.';
}

if (! empty($errors)) {
    return view('auth/index.view.php', [
        'errors' => $errors
    ]);
}
