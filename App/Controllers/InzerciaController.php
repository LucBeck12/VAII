<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Models\Inzerat;

class InzerciaController extends AControllerBase
{

    public function index()
    {
        return $this->html(Inzerat::getAll());
        //return Inzerat::getAll();
    }

    public function pridaj()
    {
        //if (!isset($_POST['nadpis']) || !isset($_POST['text']) || !isset($_POST['typ']) || !isset($_POST['kategoria'])) return null;
        /* $inzerat = new Inzerat($_POST['nadpis'], $_POST['text'], $_POST['typ'], $_POST['kategoria'], $_POST['cena'], $_POST['telefonneCislo'], $_POST['email']);
         $validacia = $this->validuj($_POST['nadpis'], $_POST['text'], $_POST['cena'], $_POST['telefonneCislo'], $_POST['email']);
         if ($validacia == null) {
             $inzerat->save();
             header("Location: http://localhost/semka/?c=inzercia");
         }
         $data = [
             'inzerat' => $inzerat,
             'chyby' => $validacia,
         ];*/
        $formData = $this->app->getRequest()->getPost();
        $data = [];
        if (isset($formData['submit'])) {
            $inzerat = new Inzerat($_POST['nadpis'], $_POST['text'], $_POST['typ'], $_POST['kategoria'], $_POST['cena'],
                $_POST['telefonneCislo'], $_POST['email']);
            $validacia = $this->validuj($_POST['nadpis'], $_POST['text'], $_POST['cena'], $_POST['telefonneCislo'], $_POST['email']);
            if ($validacia == null) {
                $inzerat->save();
                return $this->redirect('?c=inzercia');
            }
            $data = ($validacia != null ? [
                'inzerat' => $inzerat,
                'chyby' => $validacia,
            ] : []);
        }
        return $this->html($data, 'pridaj');
    }

    public function zmaz()
    {
        if (isset($_GET['id'])) {
            $inzerat = Inzerat::getOne($_GET['id']);
            $inzerat->delete();
        }
        //header("Location: http://localhost/semka/?c=inzercia");
        return $this->redirect('?c=inzercia');
    }

    public function uprav()
    {
        /*$validacia = null;
        if (isset($_POST['id'])) {
            $validacia = $this->validuj($_POST['nadpis'], $_POST['text'], $_POST['cena'], $_POST['telefonneCislo'], $_POST['email']);
            $inzerat = Inzerat::getOne($_POST['id']);
            $inzerat->setNadpis($_POST['nadpis']);
            $inzerat->setText($_POST['text']);
            $inzerat->setTyp($_POST['typ']);
            $inzerat->setKategoria($_POST['kategoria']);
            $inzerat->setCena($_POST['cena']);
            $inzerat->setTelefonneCislo($_POST['telefonneCislo']);
            $inzerat->setEmail($_POST['email']);

            if ($validacia == null) {
                $inzerat->save();
                header("Location: http://localhost/semka/?c=inzercia");
            }
        } else {
            $inzerat = Inzerat::getOne($_GET['id']);
        }
        return [
            'inzerat' => $inzerat,
            'chyby' => $validacia,
        ];*/

        $data = null;
        $validacia = null;
        if (isset($_POST['id'])) {
            $validacia = $this->validuj($_POST['nadpis'], $_POST['text'], $_POST['cena'], $_POST['telefonneCislo'], $_POST['email']);
            $inzerat = Inzerat::getOne($_POST['id']);
            $inzerat->setNadpis($_POST['nadpis']);
            $inzerat->setText($_POST['text']);
            $inzerat->setTyp($_POST['typ']);
            $inzerat->setKategoria($_POST['kategoria']);
            $inzerat->setCena($_POST['cena']);
            $inzerat->setTelefonneCislo($_POST['telefonneCislo']);
            $inzerat->setEmail($_POST['email']);

            if ($validacia == null) {
                $inzerat->save();
                return $this->redirect('?c=inzercia');
            }
        } else {
            $inzerat = Inzerat::getOne($_GET['id']);
        }
        $data = [
            'inzerat' => $inzerat,
            'chyby' => $validacia,
        ];
        return $this->html($data, 'uprav');


    }

    public function validuj($nadpis, $text, $cena, $telefonneCislo, $email)
    {
        $chybyNadpisu = [];
        $chybyTextu = [];
        $chybyCeny = [];
        $chybyTelCisla = [];
        $chybyEmailu = [];

        if (strlen($nadpis) < 3) {
            $chybyNadpisu[] = "Nadpis je príliš krátky. Minimálny počet znakov 3.";
        }
        if (strlen($text) < 20) {
            $chybyTextu[] = "Text je príliš krátky. Minimálny počet znakov 20.";
        }
        if (!is_numeric($cena) && strlen($cena) != 0) {
            $chybyCeny[] = "Zlý formát ceny. Povolené znaky 0-9 a desatinná bodka.";
        }
        if (!is_numeric($telefonneCislo) && strlen($telefonneCislo) != 0) {
            $chybyTelCisla[] = "Zlý formát telefónneho čísla. Povolené znaky 0-9.";
        }
        if (substr($telefonneCislo, 0, 2) != "09" && strlen($telefonneCislo) != 0) {
            $chybyTelCisla[] = "Zlý formát telefónneho čísla. Musí začínať číslicami 09.";
        }
        if (strlen($telefonneCislo) < 10 && strlen($telefonneCislo) != 0) {
            $chybyTelCisla[] = "Zadané číslo je príliš krátke. Telefónne číslo neexistuje.";
        }
        if (strlen($telefonneCislo) > 10 && strlen($telefonneCislo) != 0) {
            $chybyTelCisla[] = "Zadané číslo je príliš dlhé. Telefónne číslo neexistuje.";
        }
        if (strlen($email) < 8 && strlen($email) != 0) {
            $chybyEmailu[] = "Zadaný email je príliš krátky. Emailová adresa neexistuje.";
        }
        return count($chybyNadpisu) > 0 || count($chybyTextu) > 0 || count($chybyCeny) > 0 || count($chybyTelCisla) > 0
        || count($chybyEmailu) > 0 ? [$chybyNadpisu, $chybyTextu, $chybyCeny, $chybyTelCisla, $chybyEmailu] : null;
    }
}