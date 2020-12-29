<?php


namespace App\Models;

class Auth
{
    static private $instance = null;

    static function getInstance(): Auth
    {
        if (Auth::$instance == null) {
            Auth::$instance = new Auth();
        }
        return Auth::$instance;
    }

    public function __construct()
    {
        session_start();
    }

    function login($login, $heslo)
    {
        $najdeny = User::getAll("login = ?", [$login]);

        if (count($najdeny) == 1) {
            $najdeny = $najdeny[0];
            if (password_verify($heslo, $najdeny->getHeslo())) {
                $_SESSION['user'] = $najdeny;
                return true;
            } else {
                return false;
            }
        } else if (count($najdeny) == 0) {
            $heslo = password_hash($heslo, PASSWORD_DEFAULT);
            $user = new User($login, $heslo);
            $user->save();
            $_SESSION['user'] = $user;
            return true;
        }
    }

    function logout()
    {
        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
            session_destroy();
        }
    }

    function getLoggedUser(): User
    {
        return $_SESSION['user'];
    }

    function isLogged()
    {
        return isset($_SESSION['user']) && $_SESSION['user'] != null;
    }
}