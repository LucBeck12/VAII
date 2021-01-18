<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    protected $id;
    protected $login;
    protected $heslo;

    public function __construct($login = '', $heslo = '')
    {
        $this->login = $login;
        $this->heslo = $heslo;
    }

    static public function setDbColumns()
    {
        return ["id", "login", "heslo"];
    }

    static public function setTableName()
    {
        return "user";
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login): void
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getHeslo(): string
    {
        return $this->heslo;
    }

    /**
     * @param mixed $password
     */
    public function setHeslo(string $heslo): void
    {
        $this->password = $heslo;
    }
}