<?php


namespace App\Controllers;

use App\Core\AControllerBase;
use App\Models\Auth;
use App\Models\Prispevok;
use App\Models\User;

class LoginController extends AControllerBase
{
    public function index()
    {
        $validacia = null;
        $data = [];
        if (isset($_POST['login'])) {
            $bool = Auth::getInstance()->login($_POST['login'], $_POST['heslo']);
            $validacia = $this->validuj($_POST['login'], $_POST['heslo']);
            if ($bool && $validacia == null) {
                return $this->redirect('?c=home');
            } else {
                if (!$bool) {
                    $chyba[] = "Nesprávny login alebo heslo!";
                    $data = ['login' => $_POST['login'], 'chyby' => [null, $chyba]];
                    return $this->html($data, 'index');
                }
                $data = ($validacia != null ? ['login' => $_POST['login'], 'chyby' => $validacia] : []);
            }
        }
        return $this->html($data, 'index');
    }

    /*public function login()
    {
        $formData = $this->app->getRequest()->getPost();
        $prihlaseny = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect('?c=chat');
            }
        }
        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data, 'login');
    }*/

    public function logout()
    {
        Auth::getInstance()->logout();
        //header("Location: ?");
        //die;
        return $this->redirect('?c=home');
    }


    /*function login($login, $heslo)
    {
        $najdeny = User::getAll("login = ?", [$login]);
        $heslo = password_hash($heslo, PASSWORD_DEFAULT);

        if (count($najdeny) == 1) {
            $najdeny = $najdeny[0];
            if (password_verify($heslo, $najdeny->getHeslo())) {
                $_SESSION['user'] = $najdeny;
                return true;
            } else {
                return false;
            }
        } else if (count($najdeny) == 0) {
            $data = [];
            if (isset($formData['submit'])) {
                $user = new User($login, $heslo);
                $validacia = $this->validuj($login, $heslo);
                if ($validacia == null) {
                    $user->save();
                    return $this->redirect('?c=home');
                }
                $data = ($validacia != null ? [
                    'user' => $user,
                    'chyby' => $validacia,
                ] : []);
            }
            return $this->html($data, 'login');
        }
    }*/

    public function validuj($login, $heslo)
    {
        $chybyLoginu = [];
        $chybyHesla = [];

        if (strlen($login) < 8) {
            $chybyLoginu[] = "Login je príliš krátky. Minimálny počet znakov 8.";
        }
        if (strlen($login) > 15) {
            $chybyLoginu[] = "Login je príliš dlhý. Maximálny počet znakov 15.";
        }

        if (strlen($heslo) < 5) {
            $chybyHesla[] = "Heslo je príliš krátke. Minimálny počet znakov 5.";
        }
        if (strlen($heslo) > 15) {
            $chybyHesla[] = "Heslo je príliš dlhé. Maximálny počet znakov 15.";
        }
        return count($chybyLoginu) > 0 || count($chybyHesla) > 0 ? [$chybyLoginu, $chybyHesla] : null;
    }
}