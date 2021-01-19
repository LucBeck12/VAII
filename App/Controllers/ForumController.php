<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Models\Auth;
use App\Models\Odpoved;
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
        if (isset($_POST['nadpis']) && isset($_POST['text']) && ($_POST['chybyInput'] == "")) {
            $user_id = Auth::getInstance()->getLoggedUser()->getId();
            $prispevok = new Prispevok($user_id, $_POST['nadpis'], $_POST['text']);
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
        if (isset($_POST['odpoved']) && isset($_POST['idPrispevku'])) {
            $user_id = Auth::getInstance()->getLoggedUser()->getId();
            $idPrispevku = $_POST['idPrispevku'];
            $odpoved = new Odpoved($user_id, $idPrispevku, $_POST['odpoved']);
            $odpoved->save();
            $this->json("ok");
        }
        return $this->html();
    }

    public function zmaz()
    {
        if (isset($_GET['id'])) {
            $odpovede = Odpoved::getAll(" prispevok_id LIKE ?", [$_GET['id']]);
            foreach ($odpovede as $data) {
                $data->delete();
            }
            $prispevok = Prispevok::getOne($_GET['id']);
            $prispevok->delete();
        }
        return $this->redirect('?c=forum');
    }

    public function zmazOdpoved()
    {
        if (isset($_GET['id'])) {
            $odpoved = Odpoved::getOne($_GET['id']);
            $odpoved->delete();
        }
        return $this->redirect('?c=forum&a=prispevok');
    }

    public function getallprispevky()
    {
        return $this->json(Prispevok::getAll());
    }

    public function getallodpovede()
    {
        return $this->json(Odpoved::getAll());
    }
}
?>