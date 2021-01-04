<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Models\Auth;
use App\Models\Komentar;
use App\Models\Message;
use App\Models\Prispevok;

class ForumController extends AControllerBase
{

    public function index()
    {
        return $this->html();
    }

    public function pridat()
    {
        if (isset($_POST['nadpis']) && isset($_POST['text'])) {
            $login = Auth::getInstance()->getLoggedUser()->getLogin();
            $prispevok = new Prispevok($login, $_POST['nadpis'], $_POST['text']);
            $prispevok->save();
            $this->json("ok");
            return $this->redirect('?c=forum');
        }
        return $this->html();
    }

    public function profil()
    {
        return $this->html();
    }

    public function mojprofil()
    {
        return $this->html();
    }

    public function prispevok()
    {
        if (isset($_POST['komentar'])) {
            $this->pridajKomentar($_POST['komentar']);
        }
        return $this->html();
    }

    public function pridajKomentar($komentar)
    {
        $login = Auth::getInstance()->getLoggedUser()->getLogin();
        $idPrispevku = $_POST['idPrispevku'];
        $comment = new Komentar($login, $idPrispevku, $komentar);
        $comment->save();
        $this->json("ok");
    }

    public function zmaz()
    {
        if (isset($_GET['id'])) {
            $prispevok = Prispevok::getOne($_GET['id']);
            $prispevok->delete();
        }
        return $this->redirect('?c=forum');
    }

    public function zmazKomentar()
    {
        if (isset($_GET['id'])) {
            $komentar = Komentar::getOne($_GET['id']);
            $komentar->delete();
        }
        return $this->redirect('?c=forum&a=prispevok');
    }

    public function getallprispevky()
    {
        return $this->json(Prispevok::getAll());
    }

    public function getallkomentare()
    {
        return $this->json(Komentar::getAll());
    }
}

?>