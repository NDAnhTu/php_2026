<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];
$form = new LoginForm();

if ($form->validate($email, $password)) {
    $authenticator = new Authenticator();
    if ($authenticator->attempt($email, $password)) {
        redirect('/');
    }
    $form->addErrors('password', 'Wrong email or password.');
}

return view('auth/index.view.php', [
    'errors' => $form->getErrors()
]);
