<?php
namespace App\Models;

use App\Core\Model;

class Inzerat extends Model
{
    protected $id;
    protected $nadpis;
    protected $typ;
    protected $kategoria;
    protected $text;
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
        $this->typ = $typ;
        $this->kategoria = $kategoria;
        $this->text = $text;
        $this->cena = $cena;
        $this->tel = $telefonneCislo;
        $this->email = $email;
    }

    static public function setDbColumns()
    {
        return ['id', 'nadpis', 'typ', 'kategoria', 'text', 'cena', 'telefonneCislo', 'email'];
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