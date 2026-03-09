<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = LoginForm::validate(['email' => $email, 'password' => $password]);

$authenticator = new Authenticator();
if ($authenticator->attempt($email, $password)) {
    redirect('/');
}

$form->addErrors('password', 'Wrong email or password.')->throw();
