<?php
namespace App\Models;

use App\Core\Model;

class Inzerat extends Model
{
    protected $id;
    protected $nadpis;
    protected $text;
    protected $typ;
    protected $kategoria;
    protected $cena;
    protected $telefonneCislo;
    protected $email;

    /**
     * Inzerat constructor.
     * @param $nadpis
     * @param $typ
     * @param $kategoria
     * @param $text
     * @param $cena
     * @param $telefonneCislo
     * @param $email
     */
    public function __construct($nadpis = "", $text = "", $typ = "", $kategoria = "", $cena = "", $telefonneCislo = "", $email = "")
    {
        $this->nadpis = $nadpis;
        $this->text = $text;
        $this->typ = $typ;
        $this->kategoria = $kategoria;
        $this->cena = $cena;
        $this->tel = $telefonneCislo;
        $this->email = $email;
    }

    static public function setDbColumns()
    {
        return ['id', 'nadpis', 'text', 'typ', 'kategoria', 'cena', 'telefonneCislo', 'email'];
    }

    static public function setTableName()
    {
        return "inzerat";
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNadpis()
    {
        return $this->nadpis;
    }

    /**
     * @return mixed
     */
    public function getTyp()
    {
        return $this->typ;
    }

    /**
     * @return mixed
     */
    public function getKategoria()
    {
        return $this->kategoria;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function getCena()
    {
        return $this->cena;
    }

    /**
     * @return mixed
     */
    public function getTelefonneCislo()
    {
        return $this->telefonneCislo;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
}