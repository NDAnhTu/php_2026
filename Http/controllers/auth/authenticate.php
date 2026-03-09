<?php

use Core\Authenticator;
use Http\Forms\LoginForm;
use Core\Session;

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

Session::flash('errors', $form->getErrors());
Session::flash('old', ['email' => $email, 'password' => $password]);

redirect('/login');
