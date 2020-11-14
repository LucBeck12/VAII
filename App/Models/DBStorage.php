<?php

namespace App\Models;
require_once "Inzerat.php";
use PDO;

class DBStorage
{
    /**
     * @var PDO
     */
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=inzercia", "root", "dtb456", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,]);
    }

    public function LoadAll()
    {
        $result = [];

        $r = $this->pdo->query("SELECT * FROM inzerat");

        foreach ($r as $item) {
            $result[] = new Inzerat($item['nadpis'],$item['text'],$item['typ'],$item['kategoria'],$item['cena'],$item['telefonneCislo'],$item['email']);
        }
        return $result;
    }

    /**public function Save(Article $param)
    {
        $statement = $this->pdo->prepare("INSERT INTO articles (title, text) value (?,?)");
        $statement->execute([$param->getTitle(), $param->getText()]);
    }**/
}