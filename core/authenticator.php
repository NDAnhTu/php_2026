<?php

namespace Core;

use Core\Database;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login($user);
                return true;
            }
        }
        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'name' => $user['name'],
            'id' => $user['id']
        ];
    }

    public function logout()
    {
        session_destroy();
        session_regenerate_id(true);
    }
}
