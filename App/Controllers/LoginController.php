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
            $validacia = $this->validuj($_POST['login'], $_POST['heslo']);
            if ($validacia == null) {
                $bool = Auth::getInstance()->login($_POST['login'], $_POST['heslo']);
                if ($bool) {
                    return $this->redirect('?c=home');
                } else {
                    $chyba[] = "Nesprávny login alebo heslo!";
                    $data = ['login' => $_POST['login'], 'chyby' => [null, $chyba]];
                    return $this->html($data, 'index');
                }
            }
            $data = ($validacia != null ? ['login' => $_POST['login'], 'chyby' => $validacia] : []);
        }
        return $this->html($data, 'index');
    }

    public function logout()
    {
        Auth::getInstance()->logout();
        return $this->redirect('?c=home');
    }

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