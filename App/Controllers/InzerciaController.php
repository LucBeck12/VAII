<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Models\Inzerat;

class InzerciaController extends AControllerBase
{

    public function index()
    {
        return Inzerat::getAll();
    }

    public function pridaj()
    {
        if (!isset($_POST['nadpis']) || !isset($_POST['text']) || !isset($_POST['typ'])|| !isset($_POST['kategoria'])) return null;

        $inzerat = new Inzerat($_POST['nadpis'], $_POST['text'], $_POST['typ'], $_POST['kategoria'], $_POST['cena'], $_POST['telefonneCislo'], $_POST['email']);
        $inzerat->save();

        header("Location: http://localhost/semka/?c=inzercia");
    }

    public function zmaz()
    {
        if (isset($_GET['id'])) {
            $inzerat = Inzerat::getOne($_GET['id']);
            $inzerat->delete();
        }

        header("Location: http://localhost/semka/?c=inzercia");
    }

    public function uprav()
    {
        $inzerat = Inzerat::getOne($_GET['id']);
        return $inzerat;
    }
}